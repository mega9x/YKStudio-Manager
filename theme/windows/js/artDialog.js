(function(l, g) {
    if (l.jQuery) {
        return jQuery
    }
    var k = l.art = function(r, s) {
        return new k.fn.init(r, s)
    },
    m = false,
    p = [],
    n,
    i,
    c = "opacity" in document.documentElement.style,
    b = /^(?:[^<]*(<[\w\W]+>)[^>]*$|#([\w\-]+)$)/,
    f = /[\n\t]/g,
    h = /alpha\([^)]*\)/i,
    q = /opacity=([^)]*)/,
    e = /^([+-]=)?([\d+-.]+)(.*)$/;
    if (l.$ === g) {
        l.$ = k
    }
    k.fn = k.prototype = {
        constructor: k,
        ready: function(r) {
            k.bindReady();
            if (k.isReady) {
                r.call(document, k)
            } else {
                if (p) {
                    p.push(r)
                }
            }
            return this
        },
        hasClass: function(r) {
            var s = " " + r + " ";
            if ((" " + this[0].className + " ").replace(f, " ").indexOf(s) > -1) {
                return true
            }
            return false
        },
        addClass: function(r) {
            if (!this.hasClass(r)) {
                this[0].className += " " + r
            }
            return this
        },
        removeClass: function(r) {
            var s = this[0];
            if (!r) {
                s.className = ""
            } else {
                if (this.hasClass(r)) {
                    s.className = s.className.replace(r, " ")
                }
            }
            return this
        },
        css: function(r, u) {
            var s,
            t = this[0],
            v = arguments[0];
            if (typeof r === "string") {
                if (u === g) {
                    return k.css(t, r)
                } else {
                    r === "opacity" ? k.opacity.set(t, u) : t.style[r] = u
                }
            } else {
                for (s in v) {
                    s === "opacity" ? k.opacity.set(t, v[s]) : t.style[s] = v[s]
                }
            }
            return this
        },
        show: function() {
            return this.css("display", "block")
        },
        hide: function() {
            return this.css("display", "none")
        },
        offset: function() {
            var t = this[0],
            v = t.getBoundingClientRect(),
            z = t.ownerDocument,
            w = z.body,
            r = z.documentElement,
            u = r.clientTop || w.clientTop || 0,
            x = r.clientLeft || w.clientLeft || 0,
            y = v.top + (self.pageYOffset || r.scrollTop) - u,
            s = v.left + (self.pageXOffset || r.scrollLeft) - x;
            return {
                left: s,
                top: y
            }
        },
        html: function(s) {
            var r = this[0];
            if (s === g) {
                return r.innerHTML
            }
            k.cleanData(r.getElementsByTagName("*"));
            r.innerHTML = s;
            return this
        },
        remove: function() {
            var r = this[0];
            k.cleanData(r.getElementsByTagName("*"));
            k.cleanData([r]);
            r.parentNode.removeChild(r);
            return this
        },
        bind: function(r, s) {
            k.event.add(this[0], r, s);
            return this
        },
        unbind: function(r, s) {
            k.event.remove(this[0], r, s);
            return this
        }
    };
    k.fn.init = function(r, t) {
        var s,
        u;
        t = t || document;
        if (!r) {
            return this
        }
        if (r.nodeType) {
            this[0] = r;
            return this
        }
        if (r === "body" && t.body) {
            this[0] = t.body;
            return this
        }
        if (r === "head" || r === "html") {
            this[0] = t.getElementsByTagName(r)[0];
            return this
        }
        if (typeof r === "string") {
            s = b.exec(r);
            if (s && s[2]) {
                u = t.getElementById(s[2]);
                if (u && u.parentNode) {
                    this[0] = u
                }
                return this
            }
        }
        if (typeof r === "function") {
            return k(document).ready(r)
        }
        this[0] = r;
        return this
    };
    k.fn.init.prototype = k.fn;
    k.noop = function() {};
    k.isWindow = function(r) {
        return r && typeof r === "object" && "setInterval" in r
    };
    k.isArray = function(r) {
        return Object.prototype.toString.call(r) === "[object Array]"
    };
    k.fn.find = function(u) {
        var t,
        s = this[0],
        r = u.split(".")[1];
        if (r) {
            if (document.getElementsByClassName) {
                t = s.getElementsByClassName(r)
            } else {
                t = o(r, s)
            }
        } else {
            t = s.getElementsByTagName(u)
        }
        return k(t[0])
    };
    function o(x, s, z) {
        s = s || document;
        z = z || "*";
        var v = 0,
        u = 0,
        y = [],
        t = s.getElementsByTagName(z),
        r = t.length,
        w = new RegExp("(^|\\s)" + x + "(\\s|$)");
        for (; v < r; v++) {
            if (w.test(t[v].className)) {
                y[u] = t[v];
                u++
            }
        }
        return y
    }
    k.each = function(w, x) {
        var s,
        t = 0,
        u = w.length,
        r = u === g;
        if (r) {
            for (s in w) {
                if (x.call(w[s], s, w[s]) === false) {
                    break
                }
            }
        } else {
            for (var v = w[0]; t < u && x.call(v, t, v) !== false; v = w[++t]) {}
        }
        return w
    };
    k.data = function(t, s, u) {
        var r = k.cache,
        v = a(t);
        if (s === g) {
            return r[v]
        }
        if (!r[v]) {
            r[v] = {}
        }
        if (u !== g) {
            r[v][s] = u
        }
        return r[v][s]
    };
    k.removeData = function(t, s) {
        var v = true,
        y = k.expando,
        r = k.cache,
        x = a(t),
        u = x && r[x];
        if (!u) {
            return
        }
        if (s) {
            delete u[s];
            for (var w in u) {
                v = false
            }
            if (v) {
                delete k.cache[x]
            }
        } else {
            delete r[x];
            if (t.removeAttribute) {
                t.removeAttribute(y)
            } else {
                t[y] = null
            }
        }
    };
    k.uuid = 0;
    k.cache = {};
    k.expando = "@cache" + (new Date).getTime();
    function a(r) {
        var t = k.expando,
        s = r === l ? 0: r[t];
        if (s === g) {
            r[t] = s = ++k.uuid
        }
        return s
    }
    k.event = {
        add: function(v, t, x) {
            var r,
            s,
            u = k.event,
            w = k.data(v, "@events") || k.data(v, "@events", {});
            r = w[t] = w[t] || {};
            s = r.listeners = r.listeners || [];
            s.push(x);
            if (!r.handler) {
                r.elem = v;
                r.handler = u.handler(r);
                document.addEventListener ? v.addEventListener(t, r.handler, false) : v.attachEvent("on" + t, r.handler)
            }
        },
        remove: function(t, y, A) {
            var v,
            r,
            z,
            x = k.event,
            w = true,
            u = k.data(t, "@events");
            if (!u) {
                return
            }
            if (!y) {
                for (v in u) {
                    x.remove(t, v)
                }
                return
            }
            r = u[y];
            if (!r) {
                return
            }
            z = r.listeners;
            if (A) {
                for (v = 0; v < z.length; v++) {
                    z[v] === A && z.splice(v--, 1)
                }
            } else {
                r.listeners = []
            }
            if (r.listeners.length === 0) {
                document.removeEventListener ? t.removeEventListener(y, r.handler, false) : t.detachEvent("on" + y, r.handler);
                delete u[y];
                r = k.data(t, "@events");
                for (var s in r) {
                    w = false
                }
                if (w) {
                    k.removeData(t, "@events")
                }
            }
        },
        handler: function(r) {
            return function(u) {
                u = k.event.fix(u || l.event);
                for (var s = 0, v = r.listeners, t; t = v[s++];) {
                    if (t.call(r.elem, u) === false) {
                        u.preventDefault();
                        u.stopPropagation()
                    }
                }
            }
        },
        fix: function(t) {
            if (t.target) {
                return t
            }
            var r = {
                target: t.srcElement || document,
                preventDefault: function() {
                    t.returnValue = false
                },
                stopPropagation: function() {
                    t.cancelBubble = true
                }
            };
            for (var s in t) {
                r[s] = t[s]
            }
            return r
        }
    };
    k.cleanData = function(s) {
        var t = 0,
        u,
        r = s.length,
        v = k.event.remove,
        w = k.removeData;
        for (; t < r; t++) {
            u = s[t];
            v(u);
            w(u)
        }
    };
    k.isReady = false;
    k.ready = function() {
        if (!k.isReady) {
            if (!document.body) {
                return setTimeout(k.ready, 13)
            }
            k.isReady = true;
            if (p) {
                var s,
                r = 0;
                while ((s = p[r++])) {
                    s.call(document, k)
                }
                p = null
            }
        }
    };
    k.bindReady = function() {
        if (m) {
            return
        }
        m = true;
        if (document.readyState === "complete") {
            return k.ready()
        }
        if (document.addEventListener) {
            document.addEventListener("DOMContentLoaded", n, false);
            l.addEventListener("load", k.ready, false)
        } else {
            if (document.attachEvent) {
                document.attachEvent("onreadystatechange", n);
                l.attachEvent("onload", k.ready);
                var r = false;
                try {
                    r = l.frameElement == null
                } catch(s) {}
                if (document.documentElement.doScroll && r) {
                    j()
                }
            }
        }
    };
    if (document.addEventListener) {
        n = function() {
            document.removeEventListener("DOMContentLoaded", n, false);
            k.ready()
        }
    } else {
        if (document.attachEvent) {
            n = function() {
                if (document.readyState === "complete") {
                    document.detachEvent("onreadystatechange", n);
                    k.ready()
                }
            }
        }
    }
    function j() {
        if (k.isReady) {
            return
        }
        try {
            document.documentElement.doScroll("left")
        } catch(r) {
            setTimeout(j, 1);
            return
        }
        k.ready()
    }
    k.css = "defaultView" in document && "getComputedStyle" in document.defaultView ? 
    function(s, r) {
        return document.defaultView.getComputedStyle(s, false)[r]
    }: function(t, s) {
        var r = s === "opacity" ? k.opacity.get(t) : t.currentStyle[s];
        return r || ""
    };
    k.opacity = {
        get: function(r) {
            return c ? document.defaultView.getComputedStyle(r, false).opacity: q.test((r.currentStyle ? r.currentStyle.filter: r.style.filter) || "") ? (parseFloat(RegExp.$1) / 100) + "": 1
        },
        set: function(u, v) {
            if (c) {
                return u.style.opacity = v
            }
            var t = u.style;
            t.zoom = 1;
            var r = "alpha(opacity=" + v * 100 + ")",
            s = t.filter || "";
            t.filter = h.test(s) ? s.replace(h, r) : t.filter + " " + r
        }
    };
    k.each(["Left", "Top"], 
    function(s, r) {
        var t = "scroll" + r;
        k.fn[t] = function(w) {
            var u = this[0],
            v;
            v = d(u);
            return v ? ("pageXOffset" in v) ? v[s ? "pageYOffset": "pageXOffset"] : v.document.documentElement[t] || v.document.body[t] : u[t]
        }
    });
    function d(r) {
        return k.isWindow(r) ? r: r.nodeType === 9 ? r.defaultView || r.parentWindow: false
    }
    k.each(["Height", "Width"], 
    function(s, r) {
        var t = r.toLowerCase();
        k.fn[t] = function(u) {
            var v = this[0];
            if (!v) {
                return u == null ? null: this
            }
            return k.isWindow(v) ? v.document.documentElement["client" + r] || v.document.body["client" + r] : (v.nodeType === 9) ? Math.max(v.documentElement["client" + r], v.body["scroll" + r], v.documentElement["scroll" + r], v.body["offset" + r], v.documentElement["offset" + r]) : null
        }
    });
    k.ajax = function(t) {
        var v = l.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP"),
        s = t.url;
        if (t.cache === false) {
            var u = (new Date()).getTime(),
            r = s.replace(/([?&])_=[^&]*/, "$1_=" + u);
            s = r + ((r === s) ? (/\?/.test(s) ? "&": "?") + "_=" + u: "")
        }
        v.onreadystatechange = function() {
            if (v.readyState === 4 && v.status === 200) {
                t.success && t.success(v.responseText);
                v.onreadystatechange = k.noop
            }
        };
        v.open("GET", s, 1);
        v.send(null)
    };
    k.fn.animate = function(r, u, z, C) {
        u = u || 400;
        if (typeof z === "function") {
            C = z
        }
        z = z && k.easing[z] ? z: "swing";
        var A = this,
        v,
        w,
        y,
        t,
        x,
        B,
        s = {
            speed: u,
            easing: z,
            callback: function() {
                if (v != null) {
                    A[0].style.overflow = ""
                }
                C && C()
            }
        };
        s.curAnim = {};
        k.each(r, 
        function(D, E) {
            s.curAnim[D] = E
        });
        k.each(r, 
        function(D, E) {
            w = new k.fx(A[0], s, D);
            y = e.exec(E);
            t = parseFloat(D === "opacity" || (A[0].style && A[0].style[D] != null) ? k.css(A[0], D) : A[0][D]);
            x = parseFloat(y[2]);
            B = y[3];
            if (D === "height" || D === "width") {
                x = Math.max(0, x);
                v = [A[0].style.overflow, A[0].style.overflowX, A[0].style.overflowY]
            }
            w.custom(t, x, B)
        });
        if (v != null) {
            A[0].style.overflow = "hidden"
        }
        return this
    };
    k.timers = [];
    k.fx = function(s, r, t) {
        this.elem = s;
        this.options = r;
        this.prop = t
    };
    k.fx.prototype = {
        custom: function(w, v, u) {
            var s = this;
            s.startTime = k.fx.now();
            s.start = w;
            s.end = v;
            s.unit = u;
            s.now = s.start;
            s.state = s.pos = 0;
            function r() {
                return s.step()
            }
            r.elem = s.elem;
            r();
            k.timers.push(r);
            if (!i) {
                i = setInterval(k.fx.tick, 13)
            }
        },
        step: function() {
            var v = this,
            u = k.fx.now(),
            r = true;
            if (u >= v.options.speed + v.startTime) {
                v.now = v.end;
                v.state = v.pos = 1;
                v.update();
                v.options.curAnim[v.prop] = true;
                for (var s in v.options.curAnim) {
                    if (v.options.curAnim[s] !== true) {
                        r = false
                    }
                }
                if (r) {
                    v.options.callback.call(v.elem)
                }
                return false
            } else {
                var w = u - v.startTime;
                v.state = w / v.options.speed;
                v.pos = k.easing[v.options.easing](v.state, w, 0, 1, v.options.speed);
                v.now = v.start + ((v.end - v.start) * v.pos);
                v.update();
                return true
            }
        },
        update: function() {
            var r = this;
            if (r.prop === "opacity") {
                k.opacity.set(r.elem, r.now)
            } else {
                if (r.elem.style && r.elem.style[r.prop] != null) {
                    r.elem.style[r.prop] = r.now + r.unit
                } else {
                    r.elem[r.prop] = r.now
                }
            }
        }
    };
    k.fx.now = function() {
        return new Date().getTime()
    };
    k.easing = {
        linear: function(t, u, r, s) {
            return r + s * t
        },
        swing: function(t, u, r, s) {
            return (( - Math.cos(t * Math.PI) / 2) + 0.5) * s + r
        }
    };
    k.fx.tick = function() {
        var s = k.timers;
        for (var r = 0; r < s.length; r++) { ! s[r]() && s.splice(r--, 1)
        } ! s.length && k.fx.stop()
    };
    k.fx.stop = function() {
        clearInterval(i);
        i = null
    };
    k.fn.stop = function() {
        var s = k.timers;
        for (var r = s.length - 1; r >= 0; r--) {
            if (s[r].elem === this[0]) {
                s.splice(r, 1)
            }
        }
        return this
    };
    return k
} (window)); (function(d, m, h) {
    d.noop = d.noop || 
    function() {};
    var o,
    b,
    k,
    c,
    s = 0,
    t = d(m),
    i = d(document),
    g = d("html"),
    f = d(function() {
        f = d("body")
    }),
    n = document.documentElement,
    a = m.VBArray && !m.XMLHttpRequest,
    q = "createTouch" in document && !("onmousemove" in n) || /(iPhone|iPad|iPod)/i.test(navigator.userAgent),
    p = "artDialog" + (new Date).getTime();
    var l = function(e, v, z) {
        e = e || {};
        if (typeof e === "string" || e.nodeType === 1) {
            e = {
                content: e,
                fixed: !q
            }
        }
        var w,
        y = [],
        A = l.defaults,
        x = e.follow = this.nodeType === 1 && this || e.follow;
        for (var u in A) {
            if (e[u] === h) {
                e[u] = A[u]
            }
        }
        d.each({
            ok: "yesFn",
            cancel: "noFn",
            close: "closeFn",
            init: "initFn",
            okVal: "yesText",
            cancelVal: "noText"
        },
        function(B, C) {
            e[B] = e[B] !== h ? e[B] : e[C]
        });
        if (typeof x === "string") {
            x = d(x)[0]
        }
        e.id = x && x[p + "follow"] || e.id || p + s;
        w = l.list[e.id];
        if (x && w) {
            return w.follow(x).focus()
        }
        if (w) {
            return w.focus()
        }
        if (q) {
            e.fixed = false
        }
        if (!d.isArray(e.button)) {
            e.button = e.button ? [e.button] : []
        }
        if (v !== h) {
            e.ok = v
        }
        if (z !== h) {
            e.cancel = z
        }
        e.ok && e.button.push({
            name: e.okVal,
            callback: e.ok,
            focus: true
        });
        e.cancel && e.button.push({
            name: e.cancelVal,
            callback: e.cancel
        });
        l.defaults.zIndex = e.zIndex;
        s++;
        return l.list[e.id] = o ? o._init(e) : new l.fn._init(e)
    };
    l.fn = l.prototype = {
        version: "4.1.2",
        _init: function(e) {
            var w = this,
            v,
            u = e.icon,
            x = u && (a ? {
                png: "icons/" + u + ".png"
            }: {
                backgroundImage: "url('" + e.path + "/skins/icons/" + u + ".png')"
            });
            w._isRun = true;
            w.config = e;
            w.DOM = v = w.DOM || w._getDOM();
            v.wrap.addClass(e.skin);
            v.close[e.cancel === false ? "hide": "show"]();
            v.max[e.max === false ? "hide": "show"]();
            v.min[e.min === false ? "hide": "show"]();
            v.rb.hide();
            v.icon[0].style.display = u ? "": "none";
            v.iconBg.css(x || {
                background: "none"
            });
            v.se.css("cursor", e.resize ? "se-resize": "auto");
            v.title.css("cursor", e.drag ? "move": "auto");
            v.content.css("padding", e.padding);
            w[e.show ? "show": "hide"](true);
            w.button(e.button).title(e.title).content(e.content, true).size(e.width, e.height).time(e.time);
            e.follow ? w.follow(e.follow) : w.position(e.left, e.top);
            w.focus(e.focus);
            e.lock && w.lock();
            w._addEvent();
            w._ie6PngFix();
            o = null;
            e.init && e.init.call(w, m);
            return w
        },
        content: function(w) {
            var y,
            z,
            F,
            C,
            A = this,
            H = A.DOM,
            v = H.wrap[0],
            u = v.offsetWidth,
            G = v.offsetHeight,
            x = parseInt(v.style.left),
            D = parseInt(v.style.top),
            E = v.style.width,
            e = H.content,
            B = e[0];
            A._elemBack && A._elemBack();
            v.style.width = "auto";
            if (w === h) {
                return B
            }
            if (typeof w === "string") {
                e.html(w)
            } else {
                if (w && w.nodeType === 1) {
                    C = w.style.display;
                    y = w.previousSibling;
                    z = w.nextSibling;
                    F = w.parentNode;
                    A._elemBack = function() {
                        if (y && y.parentNode) {
                            y.parentNode.insertBefore(w, y.nextSibling)
                        } else {
                            if (z && z.parentNode) {
                                z.parentNode.insertBefore(w, z)
                            } else {
                                if (F) {
                                    F.appendChild(w)
                                }
                            }
                        }
                        w.style.display = C;
                        A._elemBack = null
                    };
                    e.html("");
                    B.appendChild(w);
                    w.style.display = "block"
                }
            }
            if (!arguments[1]) {
                if (A.config.follow) {
                    A.follow(A.config.follow)
                } else {
                    u = v.offsetWidth - u;
                    G = v.offsetHeight - G;
                    x = x - u / 2;
                    D = D - G / 2;
                    v.style.left = Math.max(x, 0) + "px";
                    v.style.top = Math.max(D, 0) + "px"
                }
                if (E && E !== "auto") {
                    v.style.width = v.offsetWidth + "px"
                }
                A._autoPositionType()
            }
            A._ie6SelectFix();
            A._runScript(B);
            return A
        },
        title: function(x) {
            var v = this.DOM,
            u = v.wrap,
            w = v.title,
            e = "aui_state_noTitle";
            if (x === h) {
                return w[0]
            }
            if (x === false) {
                w.hide().html("");
                u.addClass(e)
            } else {
                w.show().html(x || "");
                u.removeClass(e)
            }
            return this
        },
        position: function(A, G) {
            var F = this,
            y = F.config,
            v = F.DOM.wrap[0],
            B = a ? false: y.fixed,
            E = a && F.config.fixed,
            z = i.scrollLeft(),
            I = i.scrollTop(),
            D = B ? 0: z,
            w = B ? 0: I,
            C = t.width(),
            u = t.height(),
            x = v.offsetWidth,
            H = v.offsetHeight,
            e = v.style;
            if (A || A === 0) {
                F._left = A.toString().indexOf("%") !== -1 ? A: null;
                A = F._toNumber(A, C - x);
                if (typeof A === "number") {
                    A = E ? (A += z) : A + D;
                    e.left = Math.max(A, D) + "px"
                } else {
                    if (typeof A === "string") {
                        e.left = A
                    }
                }
            }
            if (G || G === 0) {
                F._top = G.toString().indexOf("%") !== -1 ? G: null;
                G = F._toNumber(G, u - H);
                if (typeof G === "number") {
                    G = E ? (G += I) : G + w;
                    e.top = Math.max(G, w) + "px"
                } else {
                    if (typeof G === "string") {
                        e.top = G
                    }
                }
            }
            if (A !== h && G !== h) {
                F._follow = null;
                F._autoPositionType()
            }
            return F
        },
        size: function(w, D) {
            var B,
            C,
            e,
            F,
            z = this,
            x = z.config,
            E = z.DOM,
            v = E.wrap,
            y = E.main,
            A = v[0].style,
            u = y[0].style;
            if (w) {
                z._width = w.toString().indexOf("%") !== -1 ? w: null;
                B = t.width() - v[0].offsetWidth + y[0].offsetWidth;
                e = z._toNumber(w, B);
                w = e;
                if (typeof w === "number") {
                    A.width = "auto";
                    u.width = Math.max(z.config.minWidth, w) + "px";
                    A.width = v[0].offsetWidth + "px"
                } else {
                    if (typeof w === "string") {
                        u.width = w;
                        w === "auto" && v.css("width", "auto")
                    }
                }
            }
            if (D) {
                z._height = D.toString().indexOf("%") !== -1 ? D: null;
                C = t.height() - v[0].offsetHeight + y[0].offsetHeight;
                F = z._toNumber(D, C);
                D = F;
                if (typeof D === "number") {
                    u.height = Math.max(z.config.minHeight, D) + "px"
                } else {
                    if (typeof D === "string") {
                        u.height = D
                    }
                }
            }
            z._ie6SelectFix();
            return z
        },
        follow: function(O) {
            var e,
            C = this,
            P = C.config;
            if (typeof O === "string" || O && O.nodeType === 1) {
                e = d(O);
                O = e[0]
            }
            if (!O || !O.offsetWidth && !O.offsetHeight) {
                return C.position(C._left, C._top)
            }
            var A = p + "follow",
            F = t.width(),
            v = t.height(),
            x = i.scrollLeft(),
            z = i.scrollTop(),
            y = e.offset(),
            K = O.offsetWidth,
            J = O.offsetHeight,
            B = a ? false: P.fixed,
            w = B ? y.left - x: y.left,
            H = B ? y.top - z: y.top,
            D = C.DOM.wrap[0],
            N = D.style,
            u = D.offsetWidth,
            M = D.offsetHeight,
            E = w - (u - K) / 2,
            I = H + J,
            L = B ? 0: x,
            G = B ? 0: z;
            E = E < L ? w: (E + u > F) && (w - u > L) ? w - u + K: E;
            I = (I + M > v + G) && (H - M > G) ? H - M: I;
            N.left = E + "px";
            N.top = I + "px";
            C._follow && C._follow.removeAttribute(A);
            C._follow = O;
            O[A] = P.id;
            C._autoPositionType();
            return C
        },
        button: function() {
            var w = this,
            u = arguments,
            A = w.DOM,
            e = A.wrap,
            y = A.buttons,
            v = y[0],
            B = "aui_state_highlight",
            z = w._listeners = w._listeners || {},
            x = d.isArray(u[0]) ? u[0] : [].slice.call(u);
            if (u[0] === h) {
                return v
            }
            d.each(x, 
            function(E, G) {
                var C = G.name,
                F = !z[C],
                D = !F ? z[C].elem: document.createElement("button");
                if (!z[C]) {
                    z[C] = {}
                }
                if (G.callback) {
                    z[C].callback = G.callback
                }
                if (G.className) {
                    D.className = G.className
                }
                if (G.focus) {
                    w._focus && w._focus.removeClass(B);
                    w._focus = d(D).addClass(B);
                    w.focus()
                }
                D[p + "callback"] = C;
                D.disabled = !!G.disabled;
                if (F) {
                    D.innerHTML = C;
                    z[C].elem = D;
                    v.appendChild(D)
                }
            });
            y[0].style.display = x.length ? "": "none";
            w._ie6SelectFix();
            return w
        },
        show: function() {
            this.DOM.wrap.show(); ! arguments[0] && this._lockMaskWrap && this._lockMaskWrap.show();
            return this
        },
        hide: function() {
            this.DOM.wrap.hide(); ! arguments[0] && this._lockMaskWrap && this._lockMaskWrap.hide();
            return this
        },
        close: function() {
            if (!this._isRun) {
                return this
            }
            var y = this,
            x = y.DOM,
            w = x.wrap,
            z = l.list,
            v = y.config.close,
            e = y.config.follow;
            y.time();
            if (typeof v === "function" && v.call(y, m) === false) {
                return y
            }
            y.unlock();
            y._elemBack && y._elemBack();
            w[0].className = w[0].style.cssText = "";
            x.title.html("");
            x.content.html("");
            x.buttons.html("");
            if (l.focus === y) {
                l.focus = null
            }
            if (e) {
                e.removeAttribute(p + "follow")
            }
            delete z[y.config.id];
            y._removeEvent();
            y.hide(true)._setAbsolute();
            for (var u in y) {
                if (y.hasOwnProperty(u) && u !== "DOM") {
                    delete y[u]
                }
            }
            o ? w.remove() : o = y;
            return y
        },
        time: function(e) {
            var v = this,
            u = v.config.cancelVal,
            w = v._timer;
            w && clearTimeout(w);
            if (e) {
                v._timer = setTimeout(function() {
                    v._click(u)
                },
                1000 * e)
            }
            return v
        },
        focus: function() {
            var A,
            x = this,
            w = x.DOM,
            v = w.wrap,
            z = l.focus,
            u = l.defaults.zIndex++;
            v.css("zIndex", u);
            x._lockMask && x._lockMask.css("zIndex", u - 1);
            z && z.DOM.wrap.removeClass("aui_state_focus");
            l.focus = x;
            v.addClass("aui_state_focus");
            if (!arguments[0]) {
                try {
                    A = x._focus && x._focus[0] || w.close[0];
                    A && A.focus()
                } catch(y) {}
            }
            return x
        },
        lock: function() {
            if (this._lock) {
                return this
            }
            var y = this,
            z = l.defaults.zIndex - 1,
            v = y.DOM.wrap,
            x = y.config,
            A = i.width(),
            D = i.height(),
            B = y._lockMaskWrap || d(f[0].appendChild(document.createElement("div"))),
            w = y._lockMask || d(B[0].appendChild(document.createElement("div"))),
            u = "(document).documentElement",
            e = q ? "width:" + A + "px;height:" + D + "px": "width:100%;height:100%",
            C = a ? "position:absolute;left:expression(" + u + ".scrollLeft);top:expression(" + u + ".scrollTop);width:expression(" + u + ".clientWidth);height:expression(" + u + ".clientHeight)": "";
            y.focus(true);
            v.addClass("aui_state_lock");
            B[0].style.cssText = e + ";position:fixed;z-index:" + z + ";top:0;left:0;overflow:hidden;" + C;
            w[0].style.cssText = "height:100%;background:" + x.background + ";filter:alpha(opacity=0);opacity:0";
            if (a) {
                w.html('<iframe src="about:blank" style="width:100%;height:100%;position:absolute;top:0;left:0;z-index:-1;filter:alpha(opacity=0)"></iframe>')
            }
            w.stop();
            w.bind("click", 
            function() {
                y._reset()
            });
            if (x.duration === 0) {
                w.css({
                    opacity: x.opacity
                })
            } else {
                w.animate({
                    opacity: x.opacity
                },
                x.duration)
            }
            y._lockMaskWrap = B;
            y._lockMask = w;
            y._lock = true;
            return y
        },
        unlock: function() {
            var x = this,
            v = x._lockMaskWrap,
            e = x._lockMask;
            if (!x._lock) {
                return x
            }
            var w = v[0].style;
            var u = function() {
                if (a) {
                    w.removeExpression("width");
                    w.removeExpression("height");
                    w.removeExpression("left");
                    w.removeExpression("top")
                }
                w.cssText = "display:none";
                o && v.remove()
            };
            e.stop().unbind();
            x.DOM.wrap.removeClass("aui_state_lock");
            if (!x.config.duration) {
                u()
            } else {
                e.animate({
                    opacity: 0
                },
                x.config.duration, u)
            }
            x._lock = false;
            return x
        },
        _getDOM: function() {
            var x = document.createElement("div");
            x.style.cssText = "position:absolute;left:0;top:0";
            x.innerHTML = l.templates;
            document.body.appendChild(x);
            var u,
            w = 0,
            y = {
                wrap: d(x)
            },
            v = x.getElementsByTagName("*"),
            e = v.length;
            for (; w < e; w++) {
                u = v[w].className.split("aui_")[1];
                if (u) {
                    y[u] = d(v[w])
                }
            }
            return y
        },
        _toNumber: function(e, v) {
            if (!e && e !== 0 || typeof e === "number") {
                return e
            }
            var u = e.length - 1;
            if (e.lastIndexOf("px") === u) {
                e = parseInt(e)
            } else {
                if (e.lastIndexOf("%") === u) {
                    e = parseInt(v * e.split("%")[0] / 100)
                }
            }
            return e
        },
        _ie6PngFix: a ? 
        function() {
            var u = 0,
            w,
            z,
            v,
            e,
            y = l.defaults.path + "/skins/",
            x = this.DOM.wrap[0].getElementsByTagName("*");
            for (; u < x.length; u++) {
                w = x[u];
                z = w.currentStyle.png;
                if (z) {
                    v = y + z;
                    e = w.runtimeStyle;
                    e.backgroundImage = "none";
                    e.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + v + "',sizingMethod='crop')"
                }
            }
        }: d.noop,
        _ie6SelectFix: a ? 
        function() {
            var u = this.DOM.wrap,
            x = u[0],
            y = p + "iframeMask",
            w = u[y],
            v = x.offsetWidth,
            e = x.offsetHeight;
            v = v + "px";
            e = e + "px";
            if (w) {
                w.style.width = v;
                w.style.height = e
            } else {
                w = x.appendChild(document.createElement("iframe"));
                u[y] = w;
                w.src = "about:blank";
                w.style.cssText = "position:absolute;z-index:-1;left:0;top:0;filter:alpha(opacity=0);width:" + v + ";height:" + e
            }
        }: d.noop,
        _runScript: function(y) {
            var e,
            w = 0,
            z = 0,
            v = y.getElementsByTagName("script"),
            x = v.length,
            u = [];
            for (; w < x; w++) {
                if (v[w].type === "text/dialog") {
                    u[z] = v[w].innerHTML;
                    z++
                }
            }
            if (u.length) {
                u = u.join("");
                e = new Function(u);
                e.call(this)
            }
        },
        _autoPositionType: function() {
            this[this.config.fixed ? "_setFixed": "_setAbsolute"]()
        },
        _setFixed: (function() {
            a && d(function() {
                var e = "backgroundAttachment";
                if (g.css(e) !== "fixed" && f.css(e) !== "fixed") {
                    g.css({
                        backgroundImage: "url(about:blank)",
                        backgroundAttachment: "fixed"
                    })
                }
            });
            return function() {
                var w = this.DOM.wrap,
                x = w[0].style;
                if (a) {
                    var z = parseInt(w.css("left")),
                    y = parseInt(w.css("top")),
                    v = i.scrollLeft(),
                    u = i.scrollTop(),
                    e = "(document.documentElement)";
                    this._setAbsolute();
                    x.setExpression("left", "eval(" + e + ".scrollLeft + " + (z - v) + ') + "px"');
                    x.setExpression("top", "eval(" + e + ".scrollTop + " + (y - u) + ') + "px"')
                } else {
                    x.position = "fixed"
                }
            }
        } ()),
        _setAbsolute: function() {
            var e = this.DOM.wrap[0].style;
            if (a) {
                e.removeExpression("left");
                e.removeExpression("top")
            }
            e.position = "absolute"
        },
        _click: function(e) {
            var v = this,
            u = v._listeners[e] && v._listeners[e].callback;
            if (e == "max") {
                v._maxWin();
                return false
            }
            if (e == "min") {
                v._minWin();
                return false
            }
            if (e == "rb") {
                v._rbWin();
                return false
            }
            return typeof u !== "function" || u.call(v, m) !== false ? v.close() : v
        },
        _reset: function(z) {
            var y,
            x = this,
            e = x._winSize || t.width() * t.height(),
            w = x._follow,
            u = x._width,
            B = x._height,
            v = x._left,
            A = x._top;
            if (z) {
                y = x._winSize = t.width() * t.height();
                if (e === y) {
                    return
                }
            }
            if (u || B) {
                x.size(u, B)
            }
            if (w) {
                x.follow(w)
            } else {
                if (v || A) {
                    x.position(v, A)
                }
            }
        },
        _maxWin: function() {
            var u = this,
            e = u.DOM;
            u.position(0, 0);
            u.size("100%", "92%");
            e.max[0].style.display = "none";
            e.rb[0].style.display = "block";
            u._setFixed();
            u._setAbsolute()
        },
        _rbWin: function() {
            var x = this,
            w = x.DOM,
            v = x.follow,
            u = x.config.width,
            e = x.config.height,
            z = x.config.left,
            y = x.config.top;
            if (u || e) {
                x.size(u, e)
            }
            if (z || y) {
                x.position(z, y)
            }
            w.max[0].style.display = "block";
            w.rb[0].style.display = "none"
        },
        _minWin: function() {
            var e = this;
            e.hide()
        },
        _addEvent: function() {
            var e,
            x = this,
            u = x.config,
            v = "CollectGarbage" in m,
            w = x.DOM;
            x._winResize = function() {
                e && clearTimeout(e);
                e = setTimeout(function() {
                    x._reset(v)
                },
                40)
            };
            t.bind("resize", x._winResize);
            w.wrap.bind("click", 
            function(z) {
                var A = z.target,
                y;
                if (A.disabled) {
                    return false
                }
                if (A === w.max[0]) {
                    x._click("max");
                    return false
                } else {
                    if (A === w.rb[0]) {
                        x._click("rb");
                        return false
                    } else {
                        if (A === w.min[0]) {
                            x._click("min");
                            return false
                        } else {
                            if (A === w.close[0]) {
                                x._click(u.cancelVal);
                                return false
                            } else {
                                y = A[p + "callback"];
                                y && x._click(y)
                            }
                        }
                    }
                }
                x._ie6SelectFix()
            }).bind("mousedown", 
            function() {
                x.focus(true)
            })
        },
        _removeEvent: function() {
            var u = this,
            e = u.DOM;
            e.wrap.unbind();
            t.unbind("resize", u._winResize)
        }
    };
    l.fn._init.prototype = l.fn;
    d.fn.dialog = d.fn.artDialog = function() {
        var e = arguments;
        this[this.live ? "live": "bind"]("click", 
        function() {
            l.apply(this, e);
            return false
        });
        return this
    };
    l.focus = null;
    l.list = {};
    l.notice = function(C) {
        var v = C || {},
        A,
        e,
        z,
        u,
        B,
        x = 800;
        var w = {
            id: "Notice",
            left: "100%",
            top: "100%",
            fixed: true,
            drag: false,
            resize: false,
            follow: null,
            lock: false,
            init: function(D) {
                A = this;
                e = A.config;
                u = A.DOM.wrap;
                B = parseInt(u[0].style.top);
                z = B + u[0].offsetHeight;
                u.css("top", z + "px").animate({
                    top: B + "px"
                },
                x, 
                function() {
                    v.init && v.init.call(A, D)
                })
            },
            close: function(D) {
                u.animate({
                    top: z + "px"
                },
                x, 
                function() {
                    v.close && v.close.call(this, D);
                    e.close = d.noop;
                    A.close()
                });
                return false
            }
        };
        for (var y in v) {
            if (w[y] === h) {
                w[y] = v[y]
            }
        }
        return l(w)
    };
    i.bind("keydown", 
    function(v) {
        var x = v.target,
        y = x.nodeName,
        e = /^INPUT|TEXTAREA$/,
        u = l.focus,
        w = v.keyCode;
        if (!u || !u.config.esc || e.test(y)) {
            return
        }
        w === 27 && u._click(u.config.cancelVal)
    });
    c = m._artDialog_path || (function(e, u, v) {
        for (u in e) {
            if (e[u].src && e[u].src.indexOf("artDialog") !== -1) {
                v = e[u]
            }
        }
        b = v || e[e.length - 1];
        v = b.src.replace(/\\/g, "/");
        return v.lastIndexOf("/") < 0 ? ".": v.substring(0, v.lastIndexOf("/"))
    } (document.getElementsByTagName("script")));
    k = b.src.split("skin=")[1];
    if (k) {
        var j = document.createElement("link");
        j.rel = "stylesheet";
        j.href = c + "/skins/" + k + ".css?" + l.fn.version;
        b.parentNode.insertBefore(j, b)
    }
    t.bind("load", 
    function() {
        setTimeout(function() {
            if (s) {
                return
            }
            l({
                left: "-9999em",
                time: 9,
                fixed: false,
                lock: false,
                focus: false
            })
        },
        150)
    });
    try {
        document.execCommand("BackgroundImageCache", false, true)
    } catch(r) {}
    l.templates = '<div class="aui_outer"><table class="aui_border"><tbody><tr><td class="aui_nw"></td><td class="aui_n"></td><td class="aui_ne"></td></tr><tr><td class="aui_w"></td><td class="aui_c"><div class="aui_inner"><table class="aui_dialog"><tbody><tr><td colspan="2" class="aui_header"><div class="aui_titleBar"><div class="aui_title"></div><a class="aui_min" href="javascript:/*artDialog*/;"></a><a class="aui_max" href="javascript:/*artDialog*/;"></a><a class="aui_rb" href="javascript:/*artDialog*/;"></a><a class="aui_close" href="javascript:/*artDialog*/;">\xd7</a></div></td></tr><tr><td class="aui_icon"><div class="aui_iconBg"></div></td><td class="aui_main"><div class="aui_content"></div></td></tr><tr><td colspan="2" class="aui_footer"><div class="aui_buttons"></div></td></tr></tbody></table></div></td><td class="aui_e"></td></tr><tr><td class="aui_sw"></td><td class="aui_s"></td><td class="aui_se"></td></tr></tbody></table></div>';
    l.defaults = {
        content: '<div class="aui_loading"><span>loading..</span></div>',
        title: "\u6d88\u606f",
        button: null,
        ok: null,
        cancel: null,
        init: null,
        close: null,
        okVal: "\u786E\u5B9A",
        cancelVal: "\u53D6\u6D88",
        width: "auto",
        height: "auto",
        minWidth: 96,
        minHeight: 32,
        padding: "20px 25px",
        skin: "",
        icon: null,
        time: null,
        esc: true,
        focus: true,
        show: true,
        follow: null,
        path: c,
        lock: false,
        background: "#000",
        opacity: 0.7,
        duration: 300,
        fixed: false,
        left: "50%",
        top: "38.2%",
        zIndex: 1987,
        resize: true,
        drag: true,
        max: true,
        min: true
    };
    m.artDialog = d.dialog = d.artDialog = l
} ((window.jQuery && (window.art = jQuery)) || window.art, this)); (function(e) {
    var h,
    b,
    a = e(window),
    d = e(document),
    i = document.documentElement,
    f = !-[1, ] && !("minWidth" in i.style),
    g = "onlosecapture" in i,
    c = "setCapture" in i;
    artDialog.dragEvent = function() {
        var k = this,
        j = function(l) {
            var m = k[l];
            k[l] = function() {
                return m.apply(k, arguments)
            }
        };
        j("start");
        j("move");
        j("end")
    };
    artDialog.dragEvent.prototype = {
        onstart: e.noop,
        start: function(j) {
            d.bind("mousemove", this.move).bind("mouseup", this.end);
            this._sClientX = j.clientX;
            this._sClientY = j.clientY;
            this.onstart(j.clientX, j.clientY);
            return false
        },
        onmove: e.noop,
        move: function(j) {
            this._mClientX = j.clientX;
            this._mClientY = j.clientY;
            this.onmove(j.clientX - this._sClientX, j.clientY - this._sClientY);
            return false
        },
        onend: e.noop,
        end: function(j) {
            d.unbind("mousemove", this.move).unbind("mouseup", this.end);
            this.onend(j.clientX, j.clientY);
            return false
        }
    };
    b = function(j) {
        var o,
        p,
        w,
        l,
        s,
        u,
        r = artDialog.focus,
        m = r.config,
        x = r.DOM,
        k = x.wrap,
        t = x.title,
        n = x.main,
        q = m.width;
        relheight = m.height;
        var v = "getSelection" in window ? 
        function() {
            window.getSelection().removeAllRanges()
        }: function() {
            try {
                document.selection.empty()
            } catch(y) {}
        };
        h.onstart = function(z, A) {
            if (u) {
                p = n[0].offsetWidth;
                w = n[0].offsetHeight
            } else {
                l = k[0].offsetLeft;
                s = k[0].offsetTop
            }
            d.bind("dblclick", h.end); ! f && g ? t.bind("losecapture", h.end) : a.bind("blur", h.end);
            c && t[0].setCapture();
            k.addClass("aui_state_drag");
            r.focus()
        };
        h.onmove = function(A, G) {
            if (u) {
                var D = k[0].style,
                C = n[0].style,
                B = A + p,
                z = G + w;
                D.width = "auto";
                C.width = B + "px";
                D.width = k[0].offsetWidth + "px";
                C.height = Math.max(0, z) + "px"
            } else {
                var C = k[0].style,
                F = A + l,
                E = G + s;
                m.left = Math.max(o.minX, Math.min(o.maxX, F));
                m.top = Math.max(o.minY, Math.min(o.maxY, E));
                C.left = m.left + "px";
                C.top = m.top + "px"
            }
            v();
            r._ie6SelectFix()
        };
        h.onend = function(z, A) {
            d.unbind("dblclick", h.end); ! f && g ? t.unbind("losecapture", h.end) : a.unbind("blur", h.end);
            c && t[0].releaseCapture();
            f && r._autoPositionType();
            k.removeClass("aui_state_drag")
        };
        u = j.target === x.se[0] ? true: false;
        o = (function() {
            var z,
            y,
            B = r.DOM.wrap[0],
            E = B.style.position === "fixed",
            D = B.offsetWidth,
            H = B.offsetHeight,
            F = a.width(),
            A = a.height(),
            G = E ? 0: d.scrollLeft(),
            C = E ? 0: d.scrollTop(),
            z = F - D + G;
            y = A - H + C;
            return {
                minX: G,
                minY: C,
                maxX: z,
                maxY: y
            }
        })();
        h.start(j)
    };
    d.bind("mousedown", 
    function(m) {
        var k = artDialog.focus;
        if (!k) {
            return
        }
        var n = m.target,
        j = k.config,
        l = k.DOM;
        if (j.drag !== false && n === l.title[0] || j.resize !== false && n === l.se[0]) {
            h = h || new artDialog.dragEvent();
            b(m);
            return false
        }
    })
})(window.jQuery || window.art);
