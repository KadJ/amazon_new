$(function () {
    var required_fields = [
        'cti_format',
        'cti_client_id',
        'cti_host',
        'cti_port'
    ];
    
    for (i in required_fields) {
        addToValidate('CTIForm', required_fields[i], 'text', true, SUGAR.language.get('Configurator', ('lbl_' + required_fields[i]).toUpperCase()));
    }

    $('.save').on('click', function () {
        if (check_form('CTIForm')) {
            $(this.form).submit();
        }
    });

    $('.cancel').on('click', function () {
        document.location.href = 'index.php?module=Administration&action=index';
    });
    
    $('.test').on('click', function () {
        var status = $('.test_status');
        var url = $('#cti_host').val();
        if (url.search('wss://') == -1) {
            url = 'ws://' + url;
        }
        if ($('#cti_port').val()) {
            url += ':' + $('#cti_port').val();
        }
        pz.disconnect();
        url += '?CID=' + btoa($('#cti_client_id'))
            + '&CT=sugarcrm' 
            + '&GID=' 
            + '&PhoneNumber=' 
            + '&BroadcastEventsMask=0'
            + '&BroadcastGroup=' 
            + '&PzProtocolVersion=1';
        
        
        try {
            var socket = new WebSocket(url);
        } catch (e) {
            console.log(e);
            return;
        }
        
        status.text(SUGAR.language.get('Configurator', 'LBL_PLEASE_WAIT'));
        socket.onopen = function() { 
            status.text(SUGAR.language.get('Configurator', 'LBL_CONNECTION_OPEN'));
        };

        socket.onclose = function(event) { 
            if (event.wasClean) {
                status.text(SUGAR.language.get('Configurator', 'LBL_CONNECTION_CLOSE_CLEAN'));
            } else {
                status.text(SUGAR.language.get('Configurator', 'LBL_CONNECTION_CLOSE_NOCLEAN'));
            }
            status.text(status.text() + '; Code: ' + event.code + "\nReason: " + event.reason);
        };

        socket.onmessage = function(event) {
            status.text(SUGAR.language.get('Configurator', 'LBL_RECIEVED_MESSAGE'));
            console.log(event.data);
        };

        socket.onerror = function(error) { 
            if (!error.message) {
                status.text(SUGAR.language.get('Configurator', 'LBL_UNKNOWERROR'));
                return;
            }
            status.text(SUGAR.language.get('Configurator', 'LBL_ERROR') + error.message);
        };
    });
})
