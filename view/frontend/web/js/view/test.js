define(['ko', 'uiComponent'],
function($, ko, Component) {
    "use strict";
    const getEmployee = ko.observableArray([]);
    return Component.extend({
        getEmployee: function() {
            if (!getEmployee().length) {
                jQuery.ajax({
                    url: '',
                    type: 'POST',
                    complete: function(data) {
                        getEmployee(JSON.parse(data.responseText));
                    },
                });
            }
            return getEmployee;
        }
    });
});
