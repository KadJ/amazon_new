$(function () {
    var obj = {
        connect: function () {
            var d = new $.Deferred();
            
            var config = {
                host: cti.cti_host + ':' + cti.cti_port,
                client_id: cti.cti_client_id,
                user_phone: cti.cti_ext_c,
                client_type: 'sugarcrm'
            };
            
            pz.onDisconnect(function (event) {
                if (event.wasClean) {
                    obj.log('normal connection close [code:' + event.code + ', reason: ' + event.reason + ']');
                } else {
                    obj.log('unnormal connection close [code:' + event.code + ', reason: ' + event.reason + ']', 'fatal');
                }
            });
            
            if (!pz.isConnected()) {
                pz.connect(config);
                pz.onConnect(function (e) {
                    obj.log('pz connect [host:' + config.host + ', password: ' + config.client_id + ', phone:' + config.user_phone + ']');
                    d.resolve();
                });
            } else {
                d.resolve();
            }
            
            return d.promise();
        },
        log: function (message, level) {
            if (!level) {
                level = '';
            }
            console.log(message);
            $.ajax({
                 type: 'post',
                 dataType: 'json',
                 url: 'index.php',
                 data: {
                     module: 'PhoneCalls',
                     action: 'log',
                     log_level: level,
                     message: 'PZ: ' + message
                 }
             });
        },
        normilizePhone: function (phone){
            var clearPhone = phone.replace(/[^0-9a-zа-я]/gi, function (string, i) {
                if (i === 0 && string === '+') {
                    return string;
                }
                
                return '';
            });
            
            result = clearPhone.match(/(\+?)(\d+)/gi);
            if (result) {
                return result[0];
            }
            
            return '';
        },
        init: function () {
            $('.phoneCallsSend').on('click', function () {
                var link = $(this),
                    phone = link.attr('phone');

                obj.connect().done(function () {
                    console.log(phone, ' => ', obj.normilizePhone(phone));
                    pz.call(obj.normilizePhone(phone));
                });
            });

            $(window).on("blur focus", function (e) {
                if ($(this).data('prevType') !== e.type) {
                    $(this).data('prevType', e.type);

                    switch (e.type) {
                        case 'focus':
                            obj.connect();
                            break;
                    }
                }
            });

            $(window).trigger('focus');

            pz.onEvent(function (event) {
                console.log(event);
                switch (true) {
                    case event.isIncoming():
                        $.ajax({
                            type: 'get',
                            dataType: 'json',
                            url: 'index.php',
                            data: {
                                module: 'PhoneCalls',
                                action: 'saveCall',
                                event: {
                                    type: event.type,
                                    from: event.from,
                                    to: event.to,
                                    callID: event.callID
                                },
                            },
                            success: function (id) {
                                if (!cti.cti_inbound_c) {
                                    return;
                                }
                                obj.openPopup(id, event.from);
                            }
                        });
                        break;
                    case event.isOutcoming():
                    case event.isOutcomingAnswer():
                    case event.isIncomingAnswer():
                        console.log(event);
                        break;
                    case event.isTransfer():
                        $.ajax({
                            type: 'get',
                            dataType: 'json',
                            url: 'index.php',
                            data: {
                                module: 'PhoneCalls',
                                action: 'transferCall',
                                event: {
                                    type: event.type,
                                    from: event.from,
                                    callID: event.callID
                                }

                            },
                            success: function (phone) {
                                pz.transfer(event.callID, phone);
                            }
                        });
                        break;
                    case event.isHistory():
                        console.log(event);
                        $.ajax({
                            type: 'get',
                            dataType: 'json',
                            url: 'index.php',
                            data: {
                                module: 'PhoneCalls',
                                action: 'saveCall',
                                event: {
                                    type: event.type,
                                    from: event.from,
                                    to: event.to,
                                    callID: event.callID,
                                    start: event.start,
                                    end: event.end,
                                    duration: event.duration,
                                    direction: event.direction,
                                    record: event.record
                                }
                            }
                        });
                        break;
                }

            });
        },
        openPopup: function (record, phone) {
            return setTimeout(function () {
                var url = 'index.php?' + $.param({
                    module: 'PhoneCalls',
                    action: 'search',
                    record: record,
                    phone: phone
                });
                var popup = window.open(url);
                try {
                    popup.focus();
                } catch (exception) {
                    if (window['console'] != undefined && window['console']['log'] != undefined) {
                        window.console.log(exception);
                    }
                }
            }, 10);
        }
    };
    
    obj.init();
});