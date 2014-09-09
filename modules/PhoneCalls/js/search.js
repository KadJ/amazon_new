var redirect = function (url) {
    var url = jQuery.extend({
        module: 'Home',
        action: 'index',
        record: ''}, url);
    var location = 'index.php' +
        '?module=' + encodeURIComponent(url.module) +
        '&action=' + encodeURIComponent(url.action) +
        '&record=' + encodeURIComponent(url.record);
    window.location.href = location;
}

jQuery(document).ready(function () {
    /**
     * Click on create new bean button
     * @TODO: add relation between new bean and call
     */
    jQuery('a[rel="Create-New-Bean"]').click(function () {
        return true;
    });
    /**
     * Perfomes additional search processing
     * @TODO: 
     * - reinit relate with bean button
     * - reinit add phone number button
     */
    jQuery('input#Additional-Search-Submit').on('click.PhoneCallsSearch', function () {
        var success = function (data) {
            var tmp = jQuery('td[rel="Additional-Search-Result"]');
            var conteiners = {};
            for (var i = 0; i < tmp.length; i++) {
                var module = jQuery(tmp.get(i)).attr('module');
                conteiners[module] = jQuery(tmp.get(i));
                conteiners[module].html('');
            }
            for (var i = 0; i < data.length; i++) {
                var link = jQuery('<a></a>')
                    .attr('target', 'abount:blank')
                    .attr('href', 'index.php?module=' + encodeURIComponent(data[i].module) + '&action=DetailView&record=' + encodeURIComponent(data[i].record))
                    .attr('module', data[i].module)
                    .attr('record', data[i].record)
                    .html(data[i].name)
                    .click(function () {
                        return true;
                    });
                conteiners[data[i].module].append(link).append($('<br />'));
            }
        }

        $.ajax({
            type: 'get',
            dataType: 'json',
            url: 'index.php',
            data: {
                module: 'PhoneCalls',
                action: 'additionalSearch',
                params: {
                    name: $('input#Additional-Search-Name').val(),
                    last_name: $('input#Additional-Search-Last-Name').val()
                },
            },
            success: success
        });
        return false;
    });
});
