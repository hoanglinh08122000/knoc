define([
    'jquery',
    'ko',
    'uiComponent',
    'mage/url',
    'mage/storage'
], function($, ko, Component, urlBuilder, storage) {
    'use strict';

    var knockout = "";
    // var knockout = kservableArray([]);
    return Component.extend({

        defaults: {
            template: 'Dtn_Employee/knockouts'
        },

        initialize: function() {
            this._super();
            this.knockouts();

            // var left = this;
            // self.knockout(this.)
        },

        knockouts: function() {
            knockout = ko.observable("Employee");
            return knockout;
        }

    });
});
