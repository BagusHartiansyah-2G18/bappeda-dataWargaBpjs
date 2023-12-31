/**
 * https: //github.com/weizhenye/vue-highcharts
 */
(function (e, r) {
    typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = r(require('highcharts')) : typeof define === 'function' && define.amd ? define(['highcharts'], r) : e.VueHighcharts = r(e.Highcharts);
})(this, function (e) {
    'use strict';
    e = 'default' in e ? e['default'] : e;
    var r = {
        highcharts: 'Chart',
        highstock: 'StockChart',
        highmaps: 'Map',
        'highcharts-renderer': 'Renderer'
    };

    function t(e) {
        var r;
        if (e === null || typeof e !== 'object') {
            return e;
        }
        if (e instanceof Array) {
            r = [];
            for (var i = e.length - 1; i >= 0; i--) {
                r[i] = t(e[i]);
            }
            return r;
        }
        if (e instanceof Object) {
            r = {};
            for (var h in e) {
                r[h] = t(e[h]);
            }
            return r;
        }
    }

    function i(e) {
        return e('div');
    }

    function h(e, h, n) {
        var s = h[r[e]];
        if (!s) {
            return h.win ? null : {
                render: i
            };
        }
        var o = e === 'highcharts-renderer';
        var a = {
            name: e,
            props: o ? {
                width: {
                    type: Number,
                    required: true
                },
                height: {
                    type: Number,
                    required: true
                }
            } : {
                options: {
                    type: Object,
                    required: true
                }
            },
            methods: {
                _initChart: function () {
                    this._renderChart();
                    if (o) {
                        this.$watch('width', this._renderChart);
                        this.$watch('height', this._renderChart);
                    } else {
                        this.$watch('options', this._renderChart, {
                            deep: true
                        });
                    }
                },
                _renderChart: function () {
                    if (o) {
                        this.renderer && this.$el.removeChild(this.renderer.box);
                        this.renderer = new s(this.$el, this.width, this.height);
                    } else {
                        this.chart = new s(this.$el, t(this.options));
                    }
                }
            },
            beforeDestroy: function () {
                if (o) {
                    this.$el.removeChild(this.renderer.box);
                    for (var e in this.renderer) {
                        delete this.renderer[e];
                    }
                    this.renderer = null;
                } else {
                    this.chart.destroy();
                }
            }
        };
        var d = /^1\./.test(n.version);
        if (d) {
            a.template = '<div></div>';
            a.ready = function () {
                this._initChart();
            };
        } else {
            a.render = i;
            a.mounted = function () {
                this._initChart();
            };
        }
        return a;
    }

    function n(t, i) {
        var n = i && i.Highcharts || e;
        t.prototype.Highcharts = n;
        for (var s in r) {
            var o = h(s, n, t);
            o && t.component(s, o);
        }
    }
    return n;
});