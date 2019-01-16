/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 158);
/******/ })
/************************************************************************/
/******/ ({

/***/ 158:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(159);


/***/ }),

/***/ 159:
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(global) {var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

(function () {
  var innerGlobal = typeof window != "undefined" ? window : global;var exportTo = {};(function (window, global) {
    var n,
        aa = "function" == typeof Object.defineProperties ? Object.defineProperty : function (b, c, d) {
      b != Array.prototype && b != Object.prototype && (b[c] = d.value);
    },
        ba = "undefined" != typeof window && window === this ? this : "undefined" != typeof global && null != global ? global : this;function ca() {
      ca = function ca() {};ba.Symbol || (ba.Symbol = da);
    }var da = function () {
      var b = 0;return function (c) {
        return "jscomp_symbol_" + (c || "") + b++;
      };
    }();
    function ea() {
      ca();var b = ba.Symbol.iterator;b || (b = ba.Symbol.iterator = ba.Symbol("iterator"));"function" != typeof Array.prototype[b] && aa(Array.prototype, b, { configurable: !0, writable: !0, value: function value() {
          return fa(this);
        } });ea = function ea() {};
    }function fa(b) {
      var c = 0;return ha(function () {
        return c < b.length ? { done: !1, value: b[c++] } : { done: !0 };
      });
    }function ha(b) {
      ea();b = { next: b };b[ba.Symbol.iterator] = function () {
        return this;
      };return b;
    }function q(b) {
      ea();var c = b[Symbol.iterator];return c ? c.call(b) : fa(b);
    }
    function ia(b, c) {
      if (c) {
        for (var d = ba, e = b.split("."), f = 0; f < e.length - 1; f++) {
          var g = e[f];g in d || (d[g] = {});d = d[g];
        }e = e[e.length - 1];f = d[e];g = c(f);g != f && null != g && aa(d, e, { configurable: !0, writable: !0, value: g });
      }
    }
    ia("Promise", function (b) {
      function c(b) {
        this.b = 0;this.g = void 0;this.a = [];var c = this.c();try {
          b(c.resolve, c.reject);
        } catch (l) {
          c.reject(l);
        }
      }function d() {
        this.a = null;
      }function e(b) {
        return b instanceof c ? b : new c(function (c) {
          c(b);
        });
      }if (b) return b;d.prototype.b = function (b) {
        null == this.a && (this.a = [], this.f());this.a.push(b);
      };d.prototype.f = function () {
        var b = this;this.c(function () {
          b.h();
        });
      };var f = ba.setTimeout;d.prototype.c = function (b) {
        f(b, 0);
      };d.prototype.h = function () {
        for (; this.a && this.a.length;) {
          var b = this.a;this.a = [];for (var c = 0; c < b.length; ++c) {
            var d = b[c];b[c] = null;try {
              d();
            } catch (m) {
              this.g(m);
            }
          }
        }this.a = null;
      };d.prototype.g = function (b) {
        this.c(function () {
          throw b;
        });
      };c.prototype.c = function () {
        function b(b) {
          return function (e) {
            d || (d = !0, b.call(c, e));
          };
        }var c = this,
            d = !1;return { resolve: b(this.o), reject: b(this.f) };
      };c.prototype.o = function (b) {
        if (b === this) this.f(new TypeError("A Promise cannot resolve to itself"));else if (b instanceof c) this.s(b);else {
          a: switch (typeof b === "undefined" ? "undefined" : _typeof(b)) {case "object":
              var d = null != b;break a;case "function":
              d = !0;
              break a;default:
              d = !1;}d ? this.m(b) : this.h(b);
        }
      };c.prototype.m = function (b) {
        var c = void 0;try {
          c = b.then;
        } catch (l) {
          this.f(l);return;
        }"function" == typeof c ? this.u(c, b) : this.h(b);
      };c.prototype.f = function (b) {
        this.i(2, b);
      };c.prototype.h = function (b) {
        this.i(1, b);
      };c.prototype.i = function (b, c) {
        if (0 != this.b) throw Error("Cannot settle(" + b + ", " + c + "): Promise already settled in state" + this.b);this.b = b;this.g = c;this.j();
      };c.prototype.j = function () {
        if (null != this.a) {
          for (var b = 0; b < this.a.length; ++b) {
            g.b(this.a[b]);
          }this.a = null;
        }
      };
      var g = new d();c.prototype.s = function (b) {
        var c = this.c();b.Eb(c.resolve, c.reject);
      };c.prototype.u = function (b, c) {
        var d = this.c();try {
          b.call(c, d.resolve, d.reject);
        } catch (m) {
          d.reject(m);
        }
      };c.prototype.then = function (b, d) {
        function e(b, c) {
          return "function" == typeof b ? function (c) {
            try {
              f(b(c));
            } catch (R) {
              g(R);
            }
          } : c;
        }var f,
            g,
            h = new c(function (b, c) {
          f = b;g = c;
        });this.Eb(e(b, f), e(d, g));return h;
      };c.prototype["catch"] = function (b) {
        return this.then(void 0, b);
      };c.prototype.Eb = function (b, c) {
        function d() {
          switch (e.b) {case 1:
              b(e.g);break;
            case 2:
              c(e.g);break;default:
              throw Error("Unexpected state: " + e.b);}
        }var e = this;null == this.a ? g.b(d) : this.a.push(d);
      };c.resolve = e;c.reject = function (b) {
        return new c(function (c, d) {
          d(b);
        });
      };c.race = function (b) {
        return new c(function (c, d) {
          for (var f = q(b), g = f.next(); !g.done; g = f.next()) {
            e(g.value).Eb(c, d);
          }
        });
      };c.all = function (b) {
        var d = q(b),
            f = d.next();return f.done ? e([]) : new c(function (b, c) {
          function g(c) {
            return function (d) {
              h[c] = d;k--;0 == k && b(h);
            };
          }var h = [],
              k = 0;do {
            h.push(void 0), k++, e(f.value).Eb(g(h.length - 1), c), f = d.next();
          } while (!f.done);
        });
      };return c;
    });ia("Promise.prototype.finally", function (b) {
      return b ? b : function (b) {
        return this.then(function (c) {
          return Promise.resolve(b()).then(function () {
            return c;
          });
        }, function (c) {
          return Promise.resolve(b()).then(function () {
            throw c;
          });
        });
      };
    });function ja(b) {
      function c(c) {
        return b.next(c);
      }function d(c) {
        return b["throw"](c);
      }return new Promise(function (e, f) {
        function g(b) {
          b.done ? e(b.value) : Promise.resolve(b.value).then(c, d).then(g, f);
        }g(b.next());
      });
    }function r(b) {
      return ja(b());
    }
    function ka() {
      this.g = !1;this.c = null;this.A = void 0;this.l = 1;this.b = this.f = 0;this.i = this.a = null;
    }function la(b) {
      if (b.g) throw new TypeError("Generator is already running");b.g = !0;
    }ka.prototype.h = function (b) {
      this.A = b;
    };function ma(b, c) {
      b.a = { Tc: c, ed: !0 };b.l = b.f || b.b;
    }ka.prototype["return"] = function (b) {
      this.a = { "return": b };this.l = this.b;
    };function u(b, c, d) {
      b.l = d;return { value: c };
    }ka.prototype.D = function (b) {
      this.l = b;
    };function na(b, c, d) {
      b.f = c;void 0 != d && (b.b = d);
    }function pa(b, c) {
      b.f = 0;b.b = c || 0;
    }
    function qa(b, c) {
      b.l = c;b.f = 0;
    }function ra(b) {
      b.f = 0;var c = b.a.Tc;b.a = null;return c;
    }function sa(b) {
      b.i = [b.a];b.f = 0;b.b = 0;
    }function ta(b, c) {
      var d = b.i.splice(0)[0];(d = b.a = b.a || d) ? d.ed ? b.l = b.f || b.b : void 0 != d.D && b.b < d.D ? (b.l = d.D, b.a = null) : b.l = b.b : b.l = c;
    }function ua(b) {
      this.a = new ka();this.b = b;
    }function wa(b, c) {
      la(b.a);var d = b.a.c;if (d) return xa(b, "return" in d ? d["return"] : function (b) {
        return { value: b, done: !0 };
      }, c, b.a["return"]);b.a["return"](c);return ya(b);
    }
    function xa(b, c, d, e) {
      try {
        var f = c.call(b.a.c, d);if (!(f instanceof Object)) throw new TypeError("Iterator result " + f + " is not an object");if (!f.done) return b.a.g = !1, f;var g = f.value;
      } catch (h) {
        return b.a.c = null, ma(b.a, h), ya(b);
      }b.a.c = null;e.call(b.a, g);return ya(b);
    }
    function ya(b) {
      for (; b.a.l;) {
        try {
          var c = b.b(b.a);if (c) return b.a.g = !1, { value: c.value, done: !1 };
        } catch (d) {
          b.a.A = void 0, ma(b.a, d);
        }
      }b.a.g = !1;if (b.a.a) {
        c = b.a.a;b.a.a = null;if (c.ed) throw c.Tc;return { value: c["return"], done: !0 };
      }return { value: void 0, done: !0 };
    }
    function za(b) {
      this.next = function (c) {
        la(b.a);b.a.c ? c = xa(b, b.a.c.next, c, b.a.h) : (b.a.h(c), c = ya(b));return c;
      };this["throw"] = function (c) {
        la(b.a);b.a.c ? c = xa(b, b.a.c["throw"], c, b.a.h) : (ma(b.a, c), c = ya(b));return c;
      };this["return"] = function (c) {
        return wa(b, c);
      };ea();this[Symbol.iterator] = function () {
        return this;
      };
    }function v(b, c) {
      za.prototype = b.prototype;return new za(new ua(c));
    }function Aa(b, c) {
      return Object.prototype.hasOwnProperty.call(b, c);
    }
    ia("WeakMap", function (b) {
      function c(b) {
        this.a = (g += Math.random() + 1).toString();if (b) {
          ca();ea();b = q(b);for (var c; !(c = b.next()).done;) {
            c = c.value, this.set(c[0], c[1]);
          }
        }
      }function d(b) {
        Aa(b, f) || aa(b, f, { value: {} });
      }function e(b) {
        var c = Object[b];c && (Object[b] = function (b) {
          d(b);return c(b);
        });
      }if (function () {
        if (!b || !Object.seal) return !1;try {
          var c = Object.seal({}),
              d = Object.seal({}),
              e = new b([[c, 2], [d, 3]]);if (2 != e.get(c) || 3 != e.get(d)) return !1;e["delete"](c);e.set(d, 4);return !e.has(c) && 4 == e.get(d);
        } catch (m) {
          return !1;
        }
      }()) return b;
      var f = "$jscomp_hidden_" + Math.random();e("freeze");e("preventExtensions");e("seal");var g = 0;c.prototype.set = function (b, c) {
        d(b);if (!Aa(b, f)) throw Error("WeakMap key fail: " + b);b[f][this.a] = c;return this;
      };c.prototype.get = function (b) {
        return Aa(b, f) ? b[f][this.a] : void 0;
      };c.prototype.has = function (b) {
        return Aa(b, f) && Aa(b[f], this.a);
      };c.prototype["delete"] = function (b) {
        return Aa(b, f) && Aa(b[f], this.a) ? delete b[f][this.a] : !1;
      };return c;
    });
    ia("Map", function (b) {
      function c() {
        var b = {};return b.ta = b.next = b.head = b;
      }function d(b, c) {
        var d = b.a;return ha(function () {
          if (d) {
            for (; d.head != b.a;) {
              d = d.ta;
            }for (; d.next != d.head;) {
              return d = d.next, { done: !1, value: c(d) };
            }d = null;
          }return { done: !0, value: void 0 };
        });
      }function e(b, c) {
        var d = c && (typeof c === "undefined" ? "undefined" : _typeof(c));"object" == d || "function" == d ? g.has(c) ? d = g.get(c) : (d = "" + ++h, g.set(c, d)) : d = "p_" + c;var e = b.b[d];if (e && Aa(b.b, d)) for (var f = 0; f < e.length; f++) {
          var k = e[f];if (c !== c && k.key !== k.key || c === k.key) return { id: d, list: e, index: f, R: k };
        }return { id: d,
          list: e, index: -1, R: void 0 };
      }function f(b) {
        this.b = {};this.a = c();this.size = 0;if (b) {
          b = q(b);for (var d; !(d = b.next()).done;) {
            d = d.value, this.set(d[0], d[1]);
          }
        }
      }if (function () {
        if (!b || "function" != typeof b || !b.prototype.entries || "function" != typeof Object.seal) return !1;try {
          var c = Object.seal({ x: 4 }),
              d = new b(q([[c, "s"]]));if ("s" != d.get(c) || 1 != d.size || d.get({ x: 4 }) || d.set({ x: 4 }, "t") != d || 2 != d.size) return !1;var e = d.entries(),
              f = e.next();if (f.done || f.value[0] != c || "s" != f.value[1]) return !1;f = e.next();return f.done || 4 != f.value[0].x || "t" != f.value[1] || !e.next().done ? !1 : !0;
        } catch (t) {
          return !1;
        }
      }()) return b;ca();ea();var g = new WeakMap();f.prototype.set = function (b, c) {
        var d = e(this, b);d.list || (d.list = this.b[d.id] = []);d.R ? d.R.value = c : (d.R = { next: this.a, ta: this.a.ta, head: this.a, key: b, value: c }, d.list.push(d.R), this.a.ta.next = d.R, this.a.ta = d.R, this.size++);return this;
      };f.prototype["delete"] = function (b) {
        b = e(this, b);return b.R && b.list ? (b.list.splice(b.index, 1), b.list.length || delete this.b[b.id], b.R.ta.next = b.R.next, b.R.next.ta = b.R.ta, b.R.head = null, this.size--, !0) : !1;
      };f.prototype.clear = function () {
        this.b = {};this.a = this.a.ta = c();this.size = 0;
      };f.prototype.has = function (b) {
        return !!e(this, b).R;
      };f.prototype.get = function (b) {
        return (b = e(this, b).R) && b.value;
      };f.prototype.entries = function () {
        return d(this, function (b) {
          return [b.key, b.value];
        });
      };f.prototype.keys = function () {
        return d(this, function (b) {
          return b.key;
        });
      };f.prototype.values = function () {
        return d(this, function (b) {
          return b.value;
        });
      };f.prototype.forEach = function (b, c) {
        for (var d = this.entries(), e; !(e = d.next()).done;) {
          e = e.value, b.call(c, e[1], e[0], this);
        }
      };f.prototype[Symbol.iterator] = f.prototype.entries;var h = 0;return f;
    });
    ia("Set", function (b) {
      function c(b) {
        this.a = new Map();if (b) {
          b = q(b);for (var c; !(c = b.next()).done;) {
            this.add(c.value);
          }
        }this.size = this.a.size;
      }if (function () {
        if (!b || "function" != typeof b || !b.prototype.entries || "function" != typeof Object.seal) return !1;try {
          var c = Object.seal({ x: 4 }),
              e = new b(q([c]));if (!e.has(c) || 1 != e.size || e.add(c) != e || 1 != e.size || e.add({ x: 4 }) != e || 2 != e.size) return !1;var f = e.entries(),
              g = f.next();if (g.done || g.value[0] != c || g.value[1] != c) return !1;g = f.next();return g.done || g.value[0] == c || 4 != g.value[0].x || g.value[1] != g.value[0] ? !1 : f.next().done;
        } catch (h) {
          return !1;
        }
      }()) return b;ca();ea();c.prototype.add = function (b) {
        this.a.set(b, b);this.size = this.a.size;return this;
      };c.prototype["delete"] = function (b) {
        b = this.a["delete"](b);this.size = this.a.size;return b;
      };c.prototype.clear = function () {
        this.a.clear();this.size = 0;
      };c.prototype.has = function (b) {
        return this.a.has(b);
      };c.prototype.entries = function () {
        return this.a.entries();
      };c.prototype.values = function () {
        return this.a.values();
      };c.prototype.keys = c.prototype.values;
      c.prototype[Symbol.iterator] = c.prototype.values;c.prototype.forEach = function (b, c) {
        var d = this;this.a.forEach(function (e) {
          return b.call(c, e, e, d);
        });
      };return c;
    });function Ba(b, c, d) {
      b instanceof String && (b = String(b));for (var e = b.length, f = 0; f < e; f++) {
        var g = b[f];if (c.call(d, g, f, b)) return { ad: f, Kd: g };
      }return { ad: -1, Kd: void 0 };
    }ia("Array.prototype.findIndex", function (b) {
      return b ? b : function (b, d) {
        return Ba(this, b, d).ad;
      };
    });
    function Ca(b, c) {
      ea();b instanceof String && (b += "");var d = 0,
          e = { next: function next() {
          if (d < b.length) {
            var f = d++;return { value: c(f, b[f]), done: !1 };
          }e.next = function () {
            return { done: !0, value: void 0 };
          };return e.next();
        } };e[Symbol.iterator] = function () {
        return e;
      };return e;
    }ia("Array.prototype.keys", function (b) {
      return b ? b : function () {
        return Ca(this, function (b) {
          return b;
        });
      };
    });
    ia("Array.from", function (b) {
      return b ? b : function (b, d, e) {
        ea();d = null != d ? d : function (b) {
          return b;
        };var c = [],
            g = b[Symbol.iterator];if ("function" == typeof g) for (b = g.call(b); !(g = b.next()).done;) {
          c.push(d.call(e, g.value));
        } else {
          g = b.length;for (var h = 0; h < g; h++) {
            c.push(d.call(e, b[h]));
          }
        }return c;
      };
    });ia("Object.is", function (b) {
      return b ? b : function (b, d) {
        return b === d ? 0 !== b || 1 / b === 1 / d : b !== b && d !== d;
      };
    });
    ia("Array.prototype.includes", function (b) {
      return b ? b : function (b, d) {
        var c = this;c instanceof String && (c = String(c));var f = c.length,
            g = d || 0;for (0 > g && (g = Math.max(g + f, 0)); g < f; g++) {
          var h = c[g];if (h === b || Object.is(h, b)) return !0;
        }return !1;
      };
    });function Da(b, c, d) {
      if (null == b) throw new TypeError("The 'this' value for String.prototype." + d + " must not be null or undefined");if (c instanceof RegExp) throw new TypeError("First argument to String.prototype." + d + " must not be a regular expression");return b + "";
    }
    ia("String.prototype.includes", function (b) {
      return b ? b : function (b, d) {
        return -1 !== Da(this, b, "includes").indexOf(b, d || 0);
      };
    });ia("Array.prototype.find", function (b) {
      return b ? b : function (b, d) {
        return Ba(this, b, d).Kd;
      };
    });ia("String.prototype.startsWith", function (b) {
      return b ? b : function (b, d) {
        for (var c = Da(this, b, "startsWith"), f = c.length, g = b.length, h = Math.max(0, Math.min(d | 0, c.length)), k = 0; k < g && h < f;) {
          if (c[h++] != b[k++]) return !1;
        }return k >= g;
      };
    });var Ea = this;Ea.a = !0;
    function y(b, c) {
      var d = b.split("."),
          e = Ea;d[0] in e || !e.execScript || e.execScript("var " + d[0]);for (var f; d.length && (f = d.shift());) {
        d.length || void 0 === c ? e[f] ? e = e[f] : e = e[f] = {} : e[f] = c;
      }
    }function Fa(b, c) {
      function d() {}d.prototype = c.prototype;b.bg = c.prototype;b.prototype = new d();b.prototype.constructor = b;b.Yf = function (b, d, g) {
        return c.prototype[d].apply(b, Array.prototype.slice.call(arguments, 2));
      };
    }; /*
       Copyright 2016 Google Inc.
       Licensed under the Apache License, Version 2.0 (the "License");
       you may not use this file except in compliance with the License.
       You may obtain a copy of the License at
       http://www.apache.org/licenses/LICENSE-2.0
       Unless required by applicable law or agreed to in writing, software
       distributed under the License is distributed on an "AS IS" BASIS,
       WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
       See the License for the specific language governing permissions and
       limitations under the License.
       */
    function Ga(b) {
      this.c = Math.exp(Math.log(.5) / b);this.b = this.a = 0;
    }function Ha(b, c, d) {
      var e = Math.pow(b.c, c);d = d * (1 - e) + e * b.a;isNaN(d) || (b.a = d, b.b += c);
    }function Ia(b) {
      return b.a / (1 - Math.pow(b.c, b.b));
    };function Ja() {
      this.b = new Ga(2);this.c = new Ga(5);this.a = 0;
    }Ja.prototype.getBandwidthEstimate = function (b) {
      return 128E3 > this.a ? b : Math.min(Ia(this.b), Ia(this.c));
    };function Ka() {}function La() {}window.console && window.console.log.bind && (Ka = console.warn.bind(console));var Ma = /^(?:([^:/?#.]+):)?(?:\/\/(?:([^/?#]*)@)?([^/#?]*?)(?::([0-9]+))?(?=[/#?]|$))?([^?#]+)?(?:\?([^#]*))?(?:#(.*))?$/;function Na(b) {
      var c;b instanceof Na ? (Oa(this, b.ka), this.Ma = b.Ma, this.na = b.na, Pa(this, b.Za), this.ca = b.ca, Qa(this, b.a.clone()), this.Ea = b.Ea) : b && (c = String(b).match(Ma)) ? (Oa(this, c[1] || "", !0), this.Ma = Ra(c[2] || ""), this.na = Ra(c[3] || "", !0), Pa(this, c[4]), this.ca = Ra(c[5] || "", !0), Qa(this, c[6] || "", !0), this.Ea = Ra(c[7] || "")) : this.a = new Ua(null);
    }n = Na.prototype;n.ka = "";n.Ma = "";n.na = "";n.Za = null;n.ca = "";n.Ea = "";
    n.toString = function () {
      var b = [],
          c = this.ka;c && b.push(Va(c, Wa, !0), ":");if (c = this.na) {
        b.push("//");var d = this.Ma;d && b.push(Va(d, Wa, !0), "@");b.push(encodeURIComponent(c).replace(/%25([0-9a-fA-F]{2})/g, "%$1"));c = this.Za;null != c && b.push(":", String(c));
      }if (c = this.ca) this.na && "/" != c.charAt(0) && b.push("/"), b.push(Va(c, "/" == c.charAt(0) ? Xa : Ya, !0));(c = this.a.toString()) && b.push("?", c);(c = this.Ea) && b.push("#", Va(c, Za));return b.join("");
    };
    n.resolve = function (b) {
      var c = this.clone();"data" === c.ka && (c = new Na());var d = !!b.ka;d ? Oa(c, b.ka) : d = !!b.Ma;d ? c.Ma = b.Ma : d = !!b.na;d ? c.na = b.na : d = null != b.Za;var e = b.ca;if (d) Pa(c, b.Za);else if (d = !!b.ca) {
        if ("/" != e.charAt(0)) if (this.na && !this.ca) e = "/" + e;else {
          var f = c.ca.lastIndexOf("/");-1 != f && (e = c.ca.substr(0, f + 1) + e);
        }if (".." == e || "." == e) e = "";else if (-1 != e.indexOf("./") || -1 != e.indexOf("/.")) {
          f = 0 == e.lastIndexOf("/", 0);e = e.split("/");for (var g = [], h = 0; h < e.length;) {
            var k = e[h++];"." == k ? f && h == e.length && g.push("") : ".." == k ? ((1 < g.length || 1 == g.length && "" != g[0]) && g.pop(), f && h == e.length && g.push("")) : (g.push(k), f = !0);
          }e = g.join("/");
        }
      }d ? c.ca = e : d = "" !== b.a.toString();d ? Qa(c, b.a.clone()) : d = !!b.Ea;d && (c.Ea = b.Ea);return c;
    };n.clone = function () {
      return new Na(this);
    };function Oa(b, c, d) {
      b.ka = d ? Ra(c, !0) : c;b.ka && (b.ka = b.ka.replace(/:$/, ""));
    }function Pa(b, c) {
      if (c) {
        c = Number(c);if (isNaN(c) || 0 > c) throw Error("Bad port number " + c);b.Za = c;
      } else b.Za = null;
    }function Qa(b, c, d) {
      c instanceof Ua ? b.a = c : (d || (c = Va(c, $a)), b.a = new Ua(c));
    }
    function Ra(b, c) {
      return b ? c ? decodeURI(b) : decodeURIComponent(b) : "";
    }function Va(b, c, d) {
      return "string" == typeof b ? (b = encodeURI(b).replace(c, ab), d && (b = b.replace(/%25([0-9a-fA-F]{2})/g, "%$1")), b) : null;
    }function ab(b) {
      b = b.charCodeAt(0);return "%" + (b >> 4 & 15).toString(16) + (b & 15).toString(16);
    }var Wa = /[#\/\?@]/g,
        Ya = /[#\?:]/g,
        Xa = /[#\?]/g,
        $a = /[#\?@]/g,
        Za = /#/g;function Ua(b) {
      this.a = b || null;
    }n = Ua.prototype;n.ba = null;n.Gb = null;
    n.add = function (b, c) {
      if (!this.ba && (this.ba = {}, this.Gb = 0, this.a)) for (var d = this.a.split("&"), e = 0; e < d.length; e++) {
        var f = d[e].indexOf("="),
            g = null;if (0 <= f) {
          var h = d[e].substring(0, f);g = d[e].substring(f + 1);
        } else h = d[e];h = decodeURIComponent(h.replace(/\+/g, " "));g = g || "";this.add(h, decodeURIComponent(g.replace(/\+/g, " ")));
      }this.a = null;(d = this.ba.hasOwnProperty(b) && this.ba[b]) || (this.ba[b] = d = []);d.push(c);this.Gb++;return this;
    };
    n.toString = function () {
      if (this.a) return this.a;if (!this.ba) return "";var b = [],
          c;for (c in this.ba) {
        for (var d = encodeURIComponent(c), e = this.ba[c], f = 0; f < e.length; f++) {
          var g = d;"" !== e[f] && (g += "=" + encodeURIComponent(e[f]));b.push(g);
        }
      }return this.a = b.join("&");
    };n.clone = function () {
      var b = new Ua();b.a = this.a;if (this.ba) {
        var c = {},
            d;for (d in this.ba) {
          c[d] = this.ba[d].concat();
        }b.ba = c;b.Gb = this.Gb;
      }return b;
    };function z() {
      var b,
          c,
          d = new Promise(function (d, f) {
        b = d;c = f;
      });d.resolve = b;d.reject = c;return d;
    }z.prototype.resolve = function () {};z.prototype.reject = function () {};function bb(b, c) {
      var d = db();this.i = null == b.maxAttempts ? d.maxAttempts : b.maxAttempts;this.f = null == b.baseDelay ? d.baseDelay : b.baseDelay;this.h = null == b.fuzzFactor ? d.fuzzFactor : b.fuzzFactor;this.g = null == b.backoffFactor ? d.backoffFactor : b.backoffFactor;this.a = 0;this.b = this.f;if (this.c = void 0 === c ? !1 : c) this.a = 1;
    }function eb(b) {
      if (b.a >= b.i) if (b.c) b.a = 1, b.b = b.f;else return Promise.reject();var c = new z();b.a ? (window.setTimeout(c.resolve, b.b * (1 + (2 * Math.random() - 1) * b.h)), b.b *= b.g) : c.resolve();b.a++;return c;
    }
    function db() {
      return { maxAttempts: 2, baseDelay: 1E3, backoffFactor: 2, fuzzFactor: .5, timeout: 0 };
    };function A(b, c, d, e) {
      for (var f = [], g = 3; g < arguments.length; ++g) {
        f[g - 3] = arguments[g];
      }this.severity = b;this.category = c;this.code = d;this.data = f;this.handled = !1;
    }y("shaka.util.Error", A);A.prototype.toString = function () {
      return "shaka.util.Error " + JSON.stringify(this, null, "  ");
    };A.Severity = { RECOVERABLE: 1, CRITICAL: 2 };A.Category = { NETWORK: 1, TEXT: 2, MEDIA: 3, MANIFEST: 4, STREAMING: 5, DRM: 6, PLAYER: 7, CAST: 8, STORAGE: 9 };
    A.Code = { UNSUPPORTED_SCHEME: 1E3, BAD_HTTP_STATUS: 1001, HTTP_ERROR: 1002, TIMEOUT: 1003, MALFORMED_DATA_URI: 1004, UNKNOWN_DATA_URI_ENCODING: 1005, REQUEST_FILTER_ERROR: 1006, RESPONSE_FILTER_ERROR: 1007, MALFORMED_TEST_URI: 1008, UNEXPECTED_TEST_REQUEST: 1009, INVALID_TEXT_HEADER: 2E3, INVALID_TEXT_CUE: 2001, UNABLE_TO_DETECT_ENCODING: 2003, BAD_ENCODING: 2004, INVALID_XML: 2005, INVALID_MP4_TTML: 2007, INVALID_MP4_VTT: 2008, UNABLE_TO_EXTRACT_CUE_START_TIME: 2009, BUFFER_READ_OUT_OF_BOUNDS: 3E3, JS_INTEGER_OVERFLOW: 3001, EBML_OVERFLOW: 3002,
      EBML_BAD_FLOATING_POINT_SIZE: 3003, MP4_SIDX_WRONG_BOX_TYPE: 3004, MP4_SIDX_INVALID_TIMESCALE: 3005, MP4_SIDX_TYPE_NOT_SUPPORTED: 3006, WEBM_CUES_ELEMENT_MISSING: 3007, WEBM_EBML_HEADER_ELEMENT_MISSING: 3008, WEBM_SEGMENT_ELEMENT_MISSING: 3009, WEBM_INFO_ELEMENT_MISSING: 3010, WEBM_DURATION_ELEMENT_MISSING: 3011, WEBM_CUE_TRACK_POSITIONS_ELEMENT_MISSING: 3012, WEBM_CUE_TIME_ELEMENT_MISSING: 3013, MEDIA_SOURCE_OPERATION_FAILED: 3014, MEDIA_SOURCE_OPERATION_THREW: 3015, VIDEO_ERROR: 3016, QUOTA_EXCEEDED_ERROR: 3017, TRANSMUXING_FAILED: 3018,
      UNABLE_TO_GUESS_MANIFEST_TYPE: 4E3, DASH_INVALID_XML: 4001, DASH_NO_SEGMENT_INFO: 4002, DASH_EMPTY_ADAPTATION_SET: 4003, DASH_EMPTY_PERIOD: 4004, DASH_WEBM_MISSING_INIT: 4005, DASH_UNSUPPORTED_CONTAINER: 4006, DASH_PSSH_BAD_ENCODING: 4007, DASH_NO_COMMON_KEY_SYSTEM: 4008, DASH_MULTIPLE_KEY_IDS_NOT_SUPPORTED: 4009, DASH_CONFLICTING_KEY_IDS: 4010, UNPLAYABLE_PERIOD: 4011, RESTRICTIONS_CANNOT_BE_MET: 4012, NO_PERIODS: 4014, HLS_PLAYLIST_HEADER_MISSING: 4015, INVALID_HLS_TAG: 4016, HLS_INVALID_PLAYLIST_HIERARCHY: 4017, DASH_DUPLICATE_REPRESENTATION_ID: 4018,
      HLS_MULTIPLE_MEDIA_INIT_SECTIONS_FOUND: 4020, HLS_COULD_NOT_GUESS_MIME_TYPE: 4021, HLS_MASTER_PLAYLIST_NOT_PROVIDED: 4022, HLS_REQUIRED_ATTRIBUTE_MISSING: 4023, HLS_REQUIRED_TAG_MISSING: 4024, HLS_COULD_NOT_GUESS_CODECS: 4025, HLS_KEYFORMATS_NOT_SUPPORTED: 4026, DASH_UNSUPPORTED_XLINK_ACTUATE: 4027, DASH_XLINK_DEPTH_LIMIT: 4028, HLS_COULD_NOT_PARSE_SEGMENT_START_TIME: 4030, CONTENT_UNSUPPORTED_BY_BROWSER: 4032, CANNOT_ADD_EXTERNAL_TEXT_TO_LIVE_STREAM: 4033, INVALID_STREAMS_CHOSEN: 5005, NO_RECOGNIZED_KEY_SYSTEMS: 6E3, REQUESTED_KEY_SYSTEM_CONFIG_UNAVAILABLE: 6001,
      FAILED_TO_CREATE_CDM: 6002, FAILED_TO_ATTACH_TO_VIDEO: 6003, INVALID_SERVER_CERTIFICATE: 6004, FAILED_TO_CREATE_SESSION: 6005, FAILED_TO_GENERATE_LICENSE_REQUEST: 6006, LICENSE_REQUEST_FAILED: 6007, LICENSE_RESPONSE_REJECTED: 6008, ENCRYPTED_CONTENT_WITHOUT_DRM_INFO: 6010, NO_LICENSE_SERVER_GIVEN: 6012, OFFLINE_SESSION_REMOVED: 6013, EXPIRED: 6014, LOAD_INTERRUPTED: 7E3, OPERATION_ABORTED: 7001, NO_VIDEO_ELEMENT: 7002, CAST_API_UNAVAILABLE: 8E3, NO_CAST_RECEIVERS: 8001, ALREADY_CASTING: 8002, UNEXPECTED_CAST_ERROR: 8003, CAST_CANCELED_BY_USER: 8004,
      CAST_CONNECTION_TIMED_OUT: 8005, CAST_RECEIVER_APP_UNAVAILABLE: 8006, STORAGE_NOT_SUPPORTED: 9E3, INDEXED_DB_ERROR: 9001, DEPRECATED_OPERATION_ABORTED: 9002, REQUESTED_ITEM_NOT_FOUND: 9003, MALFORMED_OFFLINE_URI: 9004, CANNOT_STORE_LIVE_OFFLINE: 9005, STORE_ALREADY_IN_PROGRESS: 9006, NO_INIT_DATA_FOR_OFFLINE: 9007, LOCAL_PLAYER_INSTANCE_REQUIRED: 9008, NEW_KEY_OPERATION_NOT_SUPPORTED: 9011, KEY_NOT_FOUND: 9012, MISSING_STORAGE_CELL: 9013 };function C(b, c) {
      this.promise = b;this.b = c;this.a = !1;
    }y("shaka.util.AbortableOperation", C);function fb(b) {
      return new C(Promise.reject(b), function () {
        return Promise.resolve();
      });
    }C.failed = fb;function gb() {
      var b = Promise.reject(new A(2, 7, 7001));b["catch"](function () {});return new C(b, function () {
        return Promise.resolve();
      });
    }C.aborted = gb;function hb(b) {
      return new C(Promise.resolve(b), function () {
        return Promise.resolve();
      });
    }C.completed = hb;
    function ib(b) {
      return new C(b, function () {
        return b["catch"](function () {});
      });
    }C.notAbortable = ib;C.prototype.abort = function () {
      this.a = !0;return this.b();
    };C.prototype.abort = C.prototype.abort;function jb(b) {
      return new C(Promise.all(b.map(function (b) {
        return b.promise;
      })), function () {
        return Promise.all(b.map(function (b) {
          return b.abort();
        }));
      });
    }C.all = jb;C.prototype["finally"] = function (b) {
      this.promise.then(function () {
        return b(!0);
      }, function () {
        return b(!1);
      });return this;
    };C.prototype["finally"] = C.prototype["finally"];
    C.prototype.Z = function (b, c) {
      function d() {
        f.reject(new A(2, 7, 7001));return e.abort();
      }var e = this,
          f = new z();this.promise.then(function (c) {
        e.a ? f.reject(new A(2, 7, 7001)) : b ? d = kb(b, c, f) : f.resolve(c);
      }, function (b) {
        c ? d = kb(c, b, f) : f.reject(b);
      });return new C(f, function () {
        return d();
      });
    };C.prototype.chain = C.prototype.Z;
    function kb(b, c, d) {
      try {
        var e = b(c);if (e && e.promise && e.abort) return d.resolve(e.promise), function () {
          return e.abort();
        };d.resolve(e);return function () {
          return Promise.resolve(e).then(function () {})["catch"](function () {});
        };
      } catch (f) {
        return d.reject(f), function () {
          return Promise.resolve();
        };
      }
    };function D(b, c) {
      c = void 0 === c ? {} : c;for (var d in c) {
        this[d] = c[d];
      }this.defaultPrevented = this.cancelable = this.bubbles = !1;this.timeStamp = window.performance && window.performance.now ? window.performance.now() : Date.now();this.type = b;this.isTrusted = !1;this.target = this.currentTarget = null;this.a = !1;
    }D.prototype.preventDefault = function () {
      this.cancelable && (this.defaultPrevented = !0);
    };D.prototype.stopImmediatePropagation = function () {
      this.a = !0;
    };D.prototype.stopPropagation = function () {};function lb() {
      this.a = {};
    }n = lb.prototype;n.push = function (b, c) {
      this.a.hasOwnProperty(b) ? this.a[b].push(c) : this.a[b] = [c];
    };n.get = function (b) {
      return (b = this.a[b]) ? b.slice() : null;
    };n.getAll = function () {
      var b = [],
          c;for (c in this.a) {
        b.push.apply(b, this.a[c]);
      }return b;
    };n.remove = function (b, c) {
      var d = this.a[b];if (d) for (var e = 0; e < d.length; ++e) {
        d[e] == c && (d.splice(e, 1), --e);
      }
    };n.forEach = function (b) {
      for (var c in this.a) {
        b(c, this.a[c]);
      }
    };function E() {
      this.Xb = new lb();this.xb = this;
    }E.prototype.addEventListener = function (b, c) {
      this.Xb.push(b, c);
    };E.prototype.removeEventListener = function (b, c) {
      this.Xb.remove(b, c);
    };E.prototype.dispatchEvent = function (b) {
      for (var c = this.Xb.get(b.type) || [], d = 0; d < c.length; ++d) {
        b.target = this.xb;b.currentTarget = this.xb;var e = c[d];try {
          e.handleEvent ? e.handleEvent(b) : e.call(this, b);
        } catch (f) {}if (b.a) break;
      }return b.defaultPrevented;
    };function mb(b) {
      function c(b) {
        switch (typeof b === "undefined" ? "undefined" : _typeof(b)) {case "undefined":case "boolean":case "number":case "string":case "symbol":case "function":
            return b;default:
            if (!b || b.buffer && b.buffer.constructor == ArrayBuffer) return b;if (d.has(b)) return null;var e = b.constructor == Array;if (b.constructor != Object && !e) return null;d.add(b);var g = e ? [] : {},
                h;for (h in b) {
              g[h] = c(b[h]);
            }e && (g.length = b.length);return g;}
      }var d = new Set();return c(b);
    };function nb(b, c) {
      return "number" === typeof b && "number" === typeof c && isNaN(b) && isNaN(c) ? !0 : b === c;
    }function ob(b, c) {
      var d = b.indexOf(c);-1 < d && b.splice(d, 1);
    }function pb(b, c) {
      var d = 0;b.forEach(function (b) {
        d += c(b) ? 1 : 0;
      });return d;
    }
    function sb(b, c, d) {
      d || (d = nb);if (b.length != c.length) return !1;c = c.slice();var e = {};b = q(b);for (var f = b.next(); !f.done; e = { item: e.item }, f = b.next()) {
        e.item = f.value;f = c.findIndex(function (b) {
          return function (c) {
            return d(b.item, c);
          };
        }(e));if (-1 == f) return !1;c[f] = c[c.length - 1];c.pop();
      }return 0 == c.length;
    };function tb() {
      this.a = [];
    }function ub(b, c) {
      b.a.push(c["finally"](function () {
        ob(b.a, c);
      }));
    }tb.prototype.destroy = function () {
      var b = [];this.a.forEach(function (c) {
        c.promise["catch"](function () {});b.push(c.abort());
      });this.a = [];return Promise.all(b);
    };function F(b) {
      E.call(this);this.f = !1;this.g = new tb();this.a = new Set();this.b = new Set();this.c = b || null;
    }Fa(F, E);y("shaka.net.NetworkingEngine", F);F.RequestType = { MANIFEST: 0, SEGMENT: 1, LICENSE: 2, APP: 3, TIMING: 4 };F.PluginPriority = { FALLBACK: 1, PREFERRED: 2, APPLICATION: 3 };var vb = {};function wb(b, c, d) {
      d = d || 3;var e = vb[b];if (!e || d >= e.priority) vb[b] = { priority: d, gf: c };
    }F.registerScheme = wb;F.unregisterScheme = function (b) {
      delete vb[b];
    };F.prototype.hf = function (b) {
      this.a.add(b);
    };F.prototype.registerRequestFilter = F.prototype.hf;
    F.prototype.Nf = function (b) {
      this.a["delete"](b);
    };F.prototype.unregisterRequestFilter = F.prototype.Nf;F.prototype.Yd = function () {
      this.a.clear();
    };F.prototype.clearAllRequestFilters = F.prototype.Yd;F.prototype.jf = function (b) {
      this.b.add(b);
    };F.prototype.registerResponseFilter = F.prototype.jf;F.prototype.Of = function (b) {
      this.b["delete"](b);
    };F.prototype.unregisterResponseFilter = F.prototype.Of;F.prototype.Zd = function () {
      this.b.clear();
    };F.prototype.clearAllResponseFilters = F.prototype.Zd;
    function xb(b, c) {
      return { uris: b, method: "GET", body: null, headers: {}, allowCrossSiteCredentials: !1, retryParameters: c, licenseRequestType: null };
    }F.prototype.destroy = function () {
      this.f = !0;this.a.clear();this.b.clear();return this.g.destroy();
    };F.prototype.destroy = F.prototype.destroy;
    function yb(b) {
      b.then = function (c, d) {
        Ka("The network request interface has changed!  Please update your application to the new interface, which allows operations to be aborted.  Support for the old API will be removed in v2.5.");return b.promise.then(c, d);
      };b["catch"] = function (c) {
        Ka("The network request interface has changed!  Please update your application to the new interface, which allows operations to be aborted.  Support for the old API will be removed in v2.5.");return b.promise["catch"](c);
      };
      return b;
    }
    F.prototype.request = function (b, c) {
      var d = this;if (this.f) return yb(gb());c.method = c.method || "GET";c.headers = c.headers || {};c.retryParameters = c.retryParameters ? mb(c.retryParameters) : db();c.uris = mb(c.uris);var e = zb(this, b, c),
          f = e.Z(function () {
        return Ab(d, b, c, new bb(c.retryParameters, !1), 0, null);
      }),
          g = f.Z(function (c) {
        return Bb(d, b, c);
      }),
          h = Date.now(),
          k = 0;e.promise.then(function () {
        k = Date.now() - h;
      }, function () {});var l = 0;f.promise.then(function () {
        l = Date.now();
      }, function () {});e = g.Z(function (c) {
        var e = Date.now() - l,
            f = c.response;f.timeMs += k;f.timeMs += e;c.ye || !d.c || f.fromCache || 1 != b || d.c(f.timeMs, f.data.byteLength);return f;
      }, function (b) {
        b && (b.severity = 2);throw b;
      });ub(this.g, e);return yb(e);
    };F.prototype.request = F.prototype.request;function zb(b, c, d) {
      var e = hb(void 0),
          f = {};b = q(b.a);for (var g = b.next(); !g.done; f = { zc: f.zc }, g = b.next()) {
        f.zc = g.value, e = e.Z(function (b) {
          return function () {
            return b.zc(c, d);
          };
        }(f));
      }return e.Z(void 0, function (b) {
        if (b && 7001 == b.code) throw b;throw new A(2, 1, 1006, b);
      });
    }
    function Ab(b, c, d, e, f, g) {
      var h = new Na(d.uris[f]),
          k = h.ka,
          l = !1;k || (k = location.protocol, k = k.slice(0, -1), Oa(h, k), d.uris[f] = h.toString());var m = (k = vb[k]) ? k.gf : null;if (!m) return fb(new A(2, 1, 1E3, h));var p;return ib(eb(e)).Z(function () {
        if (b.f) return gb();p = Date.now();var e = m(d.uris[f], d, c, function (d, e) {
          b.c && 1 == c && (b.c(d, e), l = !0);
        });void 0 == e.promise && (Ka("The scheme plugin interface has changed!  Please update your scheme plugins to the new interface to add support for abort().  Support for the old plugin interface will be removed in v2.5."), e = ib(e));return e;
      }).Z(function (b) {
        void 0 == b.timeMs && (b.timeMs = Date.now() - p);return { response: b, ye: l };
      }, function (h) {
        if (h && 7001 == h.code) throw h;if (b.f) return gb();if (h && 1 == h.severity) return b.dispatchEvent(new D("retry", { error: h instanceof A ? h : null })), f = (f + 1) % d.uris.length, Ab(b, c, d, e, f, h);throw h || g;
      });
    }
    function Bb(b, c, d) {
      var e = hb(void 0);b = q(b.b);for (var f = b.next(); !f.done; f = b.next()) {
        e = e.Z(f.value.bind(null, c, d.response));
      }return e.Z(function () {
        return d;
      }, function (b) {
        if (b && 7001 == b.code) throw b;var c = 2;b instanceof A && (c = b.severity);throw new A(c, 1, 1007, b);
      });
    };function Cb() {
      this.a = new lb();
    }Cb.prototype.destroy = function () {
      Db(this);this.a = null;return Promise.resolve();
    };function G(b, c, d, e) {
      b.a && (c = new Eb(c, d, e), b.a.push(d, c));
    }function Fb(b, c, d, e) {
      G(b, c, d, function (b) {
        this.ua(c, d);e(b);
      }.bind(b));
    }Cb.prototype.ua = function (b, c) {
      if (this.a) for (var d = this.a.get(c) || [], e = 0; e < d.length; ++e) {
        var f = d[e];f.target == b && (f.ua(), this.a.remove(c, f));
      }
    };function Db(b) {
      if (b.a) {
        for (var c = b.a.getAll(), d = 0; d < c.length; ++d) {
          c[d].ua();
        }b.a.a = {};
      }
    }
    function Eb(b, c, d) {
      this.target = b;this.type = c;this.a = d;this.target.addEventListener(c, d, !1);
    }Eb.prototype.ua = function () {
      this.target.removeEventListener(this.type, this.a, !1);this.a = this.target = null;
    };var H = { $d: function $d(b, c) {
        return b.reduce(function (b, c, f) {
          return c["catch"](b.bind(null, f));
        }.bind(null, c), Promise.reject());
      }, Zb: function Zb(b, c) {
        return b.concat(c);
      }, Ga: function Ga() {}, va: function va(b) {
        return null != b;
      } };function Gb(b, c) {
      for (var d = [], e = q(b), f = e.next(); !f.done; f = e.next()) {
        d.push(c(f.value));
      }return d;
    }function Hb(b, c) {
      for (var d = q(b), e = d.next(); !e.done; e = d.next()) {
        if (!c(e.value)) return !1;
      }return !0;
    };function Ib(b) {
      var c = new Map();Object.keys(b).forEach(function (d) {
        c.set(d, b[d]);
      });return c;
    }function Jb(b) {
      var c = {};b.forEach(function (b, e) {
        c[e] = b;
      });return c;
    };function Kb(b, c) {
      var d = b;c && (d += '; codecs="' + c + '"');return d;
    }function Lb(b) {
      var c = [b.mimeType];Mb.forEach(function (d, e) {
        var f = b[e];f && c.push(d + '="' + f + '"');
      });return c.join(";");
    }function Nb(b) {
      b = b.split(".");var c = b[0];b.pop();return [c, b.join(".")];
    }var Mb = new Map().set("codecs", "codecs").set("frameRate", "framerate").set("bandwidth", "bitrate").set("width", "width").set("height", "height").set("channelsCount", "channels");function Ob(b) {
      if (!b) return "";b = new Uint8Array(b);239 == b[0] && 187 == b[1] && 191 == b[2] && (b = b.subarray(3));b = escape(Pb(b));try {
        return decodeURIComponent(b);
      } catch (c) {
        throw new A(2, 2, 2004);
      }
    }y("shaka.util.StringUtils.fromUTF8", Ob);
    function Qb(b, c, d) {
      if (!b) return "";if (!d && 0 != b.byteLength % 2) throw new A(2, 2, 2004);if (b instanceof ArrayBuffer) var e = b;else d = new Uint8Array(b.byteLength), d.set(new Uint8Array(b)), e = d.buffer;b = Math.floor(b.byteLength / 2);d = new Uint16Array(b);e = new DataView(e);for (var f = 0; f < b; f++) {
        d[f] = e.getUint16(2 * f, c);
      }return Pb(d);
    }y("shaka.util.StringUtils.fromUTF16", Qb);
    function Vb(b) {
      var c = new Uint8Array(b);if (239 == c[0] && 187 == c[1] && 191 == c[2]) return Ob(c);if (254 == c[0] && 255 == c[1]) return Qb(c.subarray(2), !1);if (255 == c[0] && 254 == c[1]) return Qb(c.subarray(2), !0);var d = function (b, c) {
        return b.byteLength <= c || 32 <= b[c] && 126 >= b[c];
      }.bind(null, c);if (0 == c[0] && 0 == c[2]) return Qb(b, !1);if (0 == c[1] && 0 == c[3]) return Qb(b, !0);if (d(0) && d(1) && d(2) && d(3)) return Ob(b);throw new A(2, 2, 2003);
    }y("shaka.util.StringUtils.fromBytesAutoDetect", Vb);
    function Wb(b) {
      b = encodeURIComponent(b);b = unescape(b);for (var c = new Uint8Array(b.length), d = 0; d < b.length; ++d) {
        c[d] = b.charCodeAt(d);
      }return c.buffer;
    }y("shaka.util.StringUtils.toUTF8", Wb);function Pb(b) {
      for (var c = "", d = 0; d < b.length; d += 16E3) {
        c += String.fromCharCode.apply(null, b.subarray(d, d + 16E3));
      }return c;
    };function Xb(b) {
      this.a = null;this.b = function () {
        this.a = null;b();
      }.bind(this);
    }y("shaka.util.Timer", Xb);Xb.prototype.cancel = function () {
      null != this.a && (clearTimeout(this.a), this.a = null);
    };Xb.prototype.cancel = Xb.prototype.cancel;Xb.prototype.yd = function (b) {
      this.cancel();this.a = setTimeout(this.b, 1E3 * b);
    };Xb.prototype.schedule = Xb.prototype.yd;Xb.prototype.pb = function (b) {
      this.cancel();var c = function () {
        this.b();this.a = setTimeout(c, 1E3 * b);
      }.bind(this);this.a = setTimeout(c, 1E3 * b);
    };Xb.prototype.scheduleRepeated = Xb.prototype.pb;function Yb(b, c) {
      var d = Pb(b);c = void 0 == c ? !0 : c;d = window.btoa(d).replace(/\+/g, "-").replace(/\//g, "_");return c ? d : d.replace(/=*$/, "");
    }y("shaka.util.Uint8ArrayUtils.toBase64", Yb);function Zb(b) {
      b = window.atob(b.replace(/-/g, "+").replace(/_/g, "/"));for (var c = new Uint8Array(b.length), d = 0; d < b.length; ++d) {
        c[d] = b.charCodeAt(d);
      }return c;
    }y("shaka.util.Uint8ArrayUtils.fromBase64", Zb);function $b(b) {
      for (var c = new Uint8Array(b.length / 2), d = 0; d < b.length; d += 2) {
        c[d / 2] = window.parseInt(b.substr(d, 2), 16);
      }return c;
    }
    y("shaka.util.Uint8ArrayUtils.fromHex", $b);function ac(b) {
      for (var c = "", d = 0; d < b.length; ++d) {
        var e = b[d].toString(16);1 == e.length && (e = "0" + e);c += e;
      }return c;
    }y("shaka.util.Uint8ArrayUtils.toHex", ac);function bc(b, c) {
      if (!b && !c) return !0;if (!b || !c || b.length != c.length) return !1;for (var d = 0; d < b.length; ++d) {
        if (b[d] != c[d]) return !1;
      }return !0;
    }y("shaka.util.Uint8ArrayUtils.equal", bc);
    function cc(b) {
      for (var c = [], d = 0; d < arguments.length; ++d) {
        c[d] = arguments[d];
      }for (var e = d = 0; e < c.length; ++e) {
        d += c[e].length;
      }d = new Uint8Array(d);for (var f = e = 0; f < c.length; ++f) {
        d.set(c[f], e), e += c[f].length;
      }return d;
    }y("shaka.util.Uint8ArrayUtils.concat", cc);function dc(b) {
      var c = this;this.u = b;this.m = this.i = this.o = null;this.P = !1;this.a = null;this.g = new Cb();this.b = new Map();this.s = [];this.j = new z();this.f = null;this.h = function (d) {
        c.j.reject(d);b.onError(d);
      };this.ma = new Map();this.X = new Map();this.J = new Xb(function () {
        return ec(c);
      });this.v = this.c = !1;this.M = [];this.ha = !1;this.B = new Xb(function () {
        return fc(c);
      });this.B.pb(1);this.j["catch"](function () {});
    }n = dc.prototype;
    n.destroy = function () {
      this.c = !0;var b = [],
          c = this.b.keys(),
          d = {};c = q(c);for (var e = c.next(); !e.done; d = { ic: d.ic }, e = c.next()) {
        e = e.value;d.ic = !1;e = e.close().then(function (b) {
          return function () {
            b.ic = !0;
          };
        }(d), H.Ga);var f = gc(hc).then(function () {
          return function () {};
        }(d));b.push(Promise.race([e, f]));
      }this.j.reject();this.g && b.push(this.g.destroy());this.m && b.push(this.m.setMediaKeys(null)["catch"](H.Ga));this.B && (this.B.cancel(), this.B = null);this.J && (this.J.cancel(), this.J = null);this.g = this.m = this.i = this.o = this.a = null;this.b.clear();this.s = [];this.u = this.h = this.f = null;return Promise.all(b);
    };n.configure = function (b) {
      this.f = b;
    };function ic(b, c, d) {
      b.s = [];b.v = d;return jc(b, c);
    }function kc(b, c, d) {
      b.s = d;b.v = 0 < d.length;return jc(b, c);
    }
    function jc(b, c) {
      var d = c.some(function (b) {
        return 0 < b.drmInfos.length;
      });if (!d) {
        var e = Ib(b.f.servers);lc(c, e);
      }var f = mc(b);if (f) {
        var g = q(c);for (e = g.next(); !e.done; e = g.next()) {
          e.value.drmInfos = [f];
        }
      }f = q(c);for (e = f.next(); !e.done; e = f.next()) {
        for (e = q(e.value.drmInfos), g = e.next(); !g.done; g = e.next()) {
          nc(g.value, Ib(b.f.servers), Ib(b.f.advanced || {}));
        }
      }e = oc(b, c);if (!e.size) return b.P = !0, Promise.resolve();e = pc(b, e);return d ? e : e["catch"](function () {});
    }
    n.Db = function (b) {
      var c = this;if (!this.i) return Fb(this.g, b, "encrypted", function () {
        c.h(new A(2, 6, 6010));
      }), Promise.resolve();this.m = b;Fb(this.g, this.m, "play", function () {
        for (var b = 0; b < c.M.length; b++) {
          qc(c, c.M[b]);
        }c.ha = !0;c.M = [];
      });b = this.m.setMediaKeys(this.i);b = b["catch"](function (b) {
        return Promise.reject(new A(2, 6, 6003, b.message));
      });var d = rc(this);return Promise.all([b, d]).then(function () {
        if (c.c) return Promise.reject();sc(c);c.a.initData.length || c.s.length || G(c.g, c.m, "encrypted", function (b) {
          return tc(c, b.initDataType, new Uint8Array(b.initData));
        });
      })["catch"](function (b) {
        return c.c ? Promise.resolve() : Promise.reject(b);
      });
    };function rc(b) {
      return r(function d() {
        var e;return v(d, function (d) {
          switch (d.l) {case 1:
              if (!(b.i && b.a && b.a.serverCertificate && b.a.serverCertificate.length)) {
                d.D(0);break;
              }na(d, 3);return u(d, b.i.setServerCertificate(b.a.serverCertificate), 5);case 5:
              qa(d, 0);break;case 3:
              return e = ra(d), d["return"](Promise.reject(new A(2, 6, 6004, e.message)));}
        });
      });
    }
    function sc(b) {
      var c = b.a ? b.a.initData : [];c.forEach(function (c) {
        return uc(b, c.initDataType, c.initData);
      });b.s.forEach(function (c) {
        return vc(b, c);
      });c.length || b.s.length || b.j.resolve();return b.j;
    }function tc(b, c, d) {
      var e = b.b.values();e = q(e);for (var f = e.next(); !f.done; f = e.next()) {
        if (bc(d, f.value.initData)) return;
      }uc(b, c, d);
    }n.keySystem = function () {
      return this.a ? this.a.keySystem : "";
    };function wc(b) {
      b = b.b.keys();b = Gb(b, function (b) {
        return b.sessionId;
      });return Array.from(b);
    }
    n.Lb = function () {
      var b = Infinity,
          c = this.b.keys();c = q(c);for (var d = c.next(); !d.done; d = c.next()) {
        d = d.value, isNaN(d.expiration) || (b = Math.min(b, d.expiration));
      }return b;
    };
    function oc(b, c) {
      for (var d = new Set(), e = q(c), f = e.next(); !f.done; f = e.next()) {
        var g = q(f.value.drmInfos);for (f = g.next(); !f.done; f = g.next()) {
          d.add(f.value);
        }
      }e = q(d);for (f = e.next(); !f.done; f = e.next()) {
        nc(f.value, Ib(b.f.servers), Ib(b.f.advanced || {}));
      }g = b.v ? "required" : "optional";var h = b.v ? ["persistent-license"] : ["temporary"];e = new Map();d = q(d);for (f = d.next(); !f.done; f = d.next()) {
        f = f.value, e.set(f.keySystem, { audioCapabilities: [], videoCapabilities: [], distinctiveIdentifier: "optional", persistentState: g, sessionTypes: h,
          label: f.keySystem, drmInfos: [] });
      }d = q(c);for (f = d.next(); !f.done; f = d.next()) {
        f = f.value;g = f.audio;h = f.video;var k = g ? Kb(g.mimeType, g.codecs) : "",
            l = h ? Kb(h.mimeType, h.codecs) : "",
            m = q(f.drmInfos);for (f = m.next(); !f.done; f = m.next()) {
          f = f.value;var p = e.get(f.keySystem);p.drmInfos.push(f);f.distinctiveIdentifierRequired && (p.distinctiveIdentifier = "required");f.persistentStateRequired && (p.persistentState = "required");g && p.audioCapabilities.push({ robustness: f.audioRobustness || "", contentType: k });h && p.videoCapabilities.push({ robustness: f.videoRobustness || "", contentType: l });
        }
      }return e;
    }
    function pc(b, c) {
      if (1 == c.size && c.has("")) return Promise.reject(new A(2, 6, 6E3));for (var d = q(c.values()), e = d.next(); !e.done; e = d.next()) {
        e = e.value, 0 == e.audioCapabilities.length && delete e.audioCapabilities, 0 == e.videoCapabilities.length && delete e.videoCapabilities;
      }var f = d = new z();[!0, !1].forEach(function (b) {
        var d = this;c.forEach(function (c, e) {
          c.drmInfos.some(function (b) {
            return !!b.licenseServerUri;
          }) == b && (f = f["catch"](function () {
            return this.c ? Promise.reject() : navigator.requestMediaKeySystemAccess(e, [c]);
          }.bind(d)));
        });
      }.bind(b));
      f = f["catch"](function () {
        return Promise.reject(new A(2, 6, 6001));
      });f = f.then(function (b) {
        if (this.c) return Promise.reject();var d = navigator.userAgent.includes("Edge/"),
            e = b.getConfiguration(),
            f = e.audioCapabilities || [];e = e.videoCapabilities || [];this.o = new Set();var g = q(f);for (f = g.next(); !f.done; f = g.next()) {
          this.o.add(f.value.contentType);
        }e = q(e);for (f = e.next(); !f.done; f = e.next()) {
          this.o.add(f.value.contentType);
        }d && (this.o = null);d = b.keySystem;e = c.get(b.keySystem);f = [];g = [];var p = [],
            t = [];xc(e.drmInfos, f, g, p, t);
        this.a = { keySystem: d, licenseServerUri: f[0], distinctiveIdentifierRequired: "required" == e.distinctiveIdentifier, persistentStateRequired: "required" == e.persistentState, audioRobustness: e.audioCapabilities ? e.audioCapabilities[0].robustness : "", videoRobustness: e.videoCapabilities ? e.videoCapabilities[0].robustness : "", serverCertificate: g[0], initData: p, keyIds: t };return this.a.licenseServerUri ? b.createMediaKeys() : Promise.reject(new A(2, 6, 6012));
      }.bind(b)).then(function (b) {
        if (this.c) return Promise.reject();this.i = b;this.P = !0;
      }.bind(b))["catch"](function (b) {
        if (this.c) return Promise.resolve();this.o = this.a = null;return b instanceof A ? Promise.reject(b) : Promise.reject(new A(2, 6, 6002, b.message));
      }.bind(b));d.reject();return f;
    }
    function mc(b) {
      b = Ib(b.f.clearKeys);if (0 == b.size) return null;var c = [],
          d = [];b.forEach(function (b, e) {
        var f = $b(e),
            g = $b(b);f = { kty: "oct", kid: Yb(f, !1), k: Yb(g, !1) };c.push(f);d.push(f.kid);
      });b = JSON.stringify({ keys: c });var e = JSON.stringify({ kids: d });e = [{ initData: new Uint8Array(Wb(e)), initDataType: "keyids" }];return { keySystem: "org.w3.clearkey", licenseServerUri: "data:application/json;base64," + window.btoa(b), distinctiveIdentifierRequired: !1, persistentStateRequired: !1, audioRobustness: "", videoRobustness: "", serverCertificate: null,
        initData: e, keyIds: [] };
    }
    function vc(b, c) {
      try {
        var d = b.i.createSession("persistent-license");
      } catch (g) {
        var e = new A(2, 6, 6005, g.message);b.h(e);return Promise.reject(e);
      }G(b.g, d, "message", b.qd.bind(b));G(b.g, d, "keystatuseschange", b.md.bind(b));var f = { initData: null, loaded: !1, tc: Infinity, za: null };b.b.set(d, f);return d.load(c).then(function (b) {
        if (!this.c) {
          if (b) return f.loaded = !0, yc(this) && this.j.resolve(), d;this.b["delete"](d);this.h(new A(2, 6, 6013));
        }
      }.bind(b), function (b) {
        this.c || (this.b["delete"](d), this.h(new A(2, 6, 6005, b.message)));
      }.bind(b));
    }
    function uc(b, c, d) {
      try {
        var e = b.v ? b.i.createSession("persistent-license") : b.i.createSession();
      } catch (f) {
        b.h(new A(2, 6, 6005, f.message));return;
      }G(b.g, e, "message", b.qd.bind(b));G(b.g, e, "keystatuseschange", b.md.bind(b));b.b.set(e, { initData: d, loaded: !1, tc: Infinity, za: null });e.generateRequest(c, d.buffer)["catch"](function (c) {
        b.c || (b.b["delete"](e), b.h(new A(2, 6, 6006, c.message)));
      });
    }n.qd = function (b) {
      this.f.delayLicenseRequestUntilPlayed && this.m.paused && !this.ha ? this.M.push(b) : qc(this, b);
    };
    function qc(b, c) {
      var d = c.target,
          e = b.b.get(d),
          f = b.a.licenseServerUri,
          g = b.f.advanced[b.a.keySystem];"individualization-request" == c.messageType && g && g.individualizationServer && (f = g.individualizationServer);f = xb([f], b.f.retryParameters);f.body = c.message;f.method = "POST";f.licenseRequestType = c.messageType;"com.microsoft.playready" != b.a.keySystem && "com.chromecast.playready" != b.a.keySystem || zc(f);b.u.Ob.request(2, f).promise.then(function (b) {
        return this.c ? Promise.reject() : d.update(b.data).then(function () {
          var b = this;this.u.onEvent(new D("drmsessionupdate"));e && (e.za && e.za.resolve(), gc(Ac).then(function () {
            e.loaded = !0;yc(b) && b.j.resolve();
          }));
        }.bind(this));
      }.bind(b), function (b) {
        if (this.c) return Promise.resolve();b = new A(2, 6, 6007, b);this.h(b);e && e.za && e.za.reject(b);
      }.bind(b))["catch"](function (b) {
        if (this.c) return Promise.resolve();b = new A(2, 6, 6008, b.message);this.h(b);e && e.za && e.za.reject(b);
      }.bind(b));
    }
    function zc(b) {
      var c = Qb(b.body, !0, !0);if (c.includes("PlayReadyKeyMessage")) {
        c = new DOMParser().parseFromString(c, "application/xml");for (var d = c.getElementsByTagName("HttpHeader"), e = 0; e < d.length; ++e) {
          b.headers[d[e].querySelector("name").textContent] = d[e].querySelector("value").textContent;
        }b.body = Zb(c.querySelector("Challenge").textContent).buffer;
      } else b.headers["Content-Type"] = "text/xml; charset=utf-8";
    }
    n.md = function (b) {
      b = b.target;var c = this.b.get(b);if (c) {
        var d = !1;b.keyStatuses.forEach(function (b, e) {
          if ("string" == typeof e) {
            var f = e;e = b;b = f;
          }if ("com.microsoft.playready" == this.a.keySystem && 16 == e.byteLength) {
            f = new DataView(e);var g = f.getUint32(0, !0),
                l = f.getUint16(4, !0),
                m = f.getUint16(6, !0);f.setUint32(0, g, !1);f.setUint16(4, l, !1);f.setUint16(6, m, !1);
          }"com.microsoft.playready" == this.a.keySystem && "status-pending" == b && (b = "usable");"status-pending" != b && (c.loaded = !0);"expired" == b && (d = !0);f = ac(new Uint8Array(e));
          this.ma.set(f, b);
        }.bind(this));var e = b.expiration - Date.now();(0 > e || d && 1E3 > e) && !c.za && (this.b["delete"](b), b.close()["catch"](function () {}));yc(this) && (this.j.resolve(), this.J.yd(Bc));
      }
    };function ec(b) {
      var c = b.ma,
          d = b.X;d.clear();c.forEach(function (b, c) {
        return d.set(c, b);
      });c = Array.from(d.values());c.length && c.every(function (b) {
        return "expired" == b;
      }) && b.h(new A(2, 6, 6014));b.u.ld(Jb(d));
    }
    function Cc() {
      function b(b) {
        return r(function h() {
          var c, f, m;return v(h, function (h) {
            switch (h.l) {case 1:
                return na(h, 2), u(h, navigator.requestMediaKeySystemAccess(b, d), 4);case 4:
                return c = h.A, m = (f = c.getConfiguration().sessionTypes) ? f.includes("persistent-license") : !1, navigator.userAgent.includes("Tizen 3") && (m = !1), e.set(b, { persistentState: m }), u(h, c.createMediaKeys(), 5);case 5:
                qa(h, 0);break;case 2:
                ra(h), e.set(b, null), h.l = 0;}
          });
        });
      }var c = [{ contentType: 'video/mp4; codecs="avc1.42E01E"' }, { contentType: 'video/webm; codecs="vp8"' }],
          d = [{ videoCapabilities: c, persistentState: "required", sessionTypes: ["persistent-license"] }, { videoCapabilities: c }],
          e = new Map();c = "org.w3.clearkey com.widevine.alpha com.microsoft.playready com.apple.fps.2_0 com.apple.fps.1_0 com.apple.fps com.adobe.primetime".split(" ").map(function (c) {
        return b(c);
      });return Promise.all(c).then(function () {
        return Jb(e);
      });
    }
    function Dc(b, c) {
      if (c.audio && c.audio.encrypted && !Ec(b, c.audio) || c.video && c.video.encrypted && !Ec(b, c.video)) return !1;var d = b.keySystem();return 0 == c.drmInfos.length || c.drmInfos.some(function (b) {
        return b.keySystem == d;
      });
    }function Ec(b, c) {
      return null == b.o ? !0 : b.o.has(Kb(c.mimeType, c.codecs));
    }
    function Fc(b, c) {
      if (!b.length) return c;if (!c.length) return b;for (var d = [], e = 0; e < b.length; e++) {
        for (var f = 0; f < c.length; f++) {
          if (b[e].keySystem == c[f].keySystem) {
            var g = b[e];f = c[f];var h = [];h = h.concat(g.initData || []);h = h.concat(f.initData || []);var k = [];k = k.concat(g.keyIds);k = k.concat(f.keyIds);d.push({ keySystem: g.keySystem, licenseServerUri: g.licenseServerUri || f.licenseServerUri, distinctiveIdentifierRequired: g.distinctiveIdentifierRequired || f.distinctiveIdentifierRequired, persistentStateRequired: g.persistentStateRequired || f.persistentStateRequired, videoRobustness: g.videoRobustness || f.videoRobustness, audioRobustness: g.audioRobustness || f.audioRobustness, serverCertificate: g.serverCertificate || f.serverCertificate, initData: h, keyIds: k });break;
          }
        }
      }return d;
    }function fc(b) {
      b.b.forEach(function (c, d) {
        var e = c.tc,
            f = d.expiration;isNaN(f) && (f = Infinity);f != e && (b.u.onExpirationUpdated(d.sessionId, f), c.tc = f);
      });
    }function yc(b) {
      b = b.b.values();return Hb(b, function (b) {
        return b.loaded;
      });
    }
    function gc(b) {
      return new Promise(function (c) {
        return setTimeout(c, 1E3 * b);
      });
    }function lc(b, c) {
      var d = [];c.forEach(function (b, c) {
        d.push({ keySystem: c, licenseServerUri: b, distinctiveIdentifierRequired: !1, persistentStateRequired: !1, audioRobustness: "", videoRobustness: "", serverCertificate: null, initData: [], keyIds: [] });
      });for (var e = q(b), f = e.next(); !f.done; f = e.next()) {
        f.value.drmInfos = d;
      }
    }
    function xc(b, c, d, e, f) {
      b.forEach(function (b) {
        c.includes(b.licenseServerUri) || c.push(b.licenseServerUri);b.serverCertificate && (d.some(function (c) {
          return bc(c, b.serverCertificate);
        }) || d.push(b.serverCertificate));b.initData && b.initData.forEach(function (b) {
          e.some(function (c) {
            return c.keyId && c.keyId == b.keyId ? !0 : c.initDataType == b.initDataType && bc(c.initData, b.initData);
          }) || e.push(b);
        });if (b.keyIds) for (var g = 0; g < b.keyIds.length; ++g) {
          f.includes(b.keyIds[g]) || f.push(b.keyIds[g]);
        }
      });
    }
    function nc(b, c, d) {
      var e = b.keySystem;if (e) {
        !b.licenseServerUri && (c = c.get(e)) && (b.licenseServerUri = c);b.keyIds || (b.keyIds = []);if (d = d.get(e)) b.distinctiveIdentifierRequired || (b.distinctiveIdentifierRequired = d.distinctiveIdentifierRequired), b.persistentStateRequired || (b.persistentStateRequired = d.persistentStateRequired), b.videoRobustness || (b.videoRobustness = d.videoRobustness), b.audioRobustness || (b.audioRobustness = d.audioRobustness), b.serverCertificate || (b.serverCertificate = d.serverCertificate);window.cast && window.cast.__platform__ && "com.microsoft.playready" == b.keySystem && (b.keySystem = "com.chromecast.playready");
      }
    }var hc = 1,
        Ac = 5,
        Bc = .5;function Gc(b) {
      return !b || 1 == b.length && 1E-6 > b.end(0) - b.start(0) ? null : b.length ? b.end(b.length - 1) : null;
    }function Lc(b, c, d) {
      d = void 0 === d ? 0 : d;return !b || !b.length || 1 == b.length && 1E-6 > b.end(0) - b.start(0) || c > b.end(b.length - 1) ? !1 : c + d >= b.start(0);
    }function Mc(b, c) {
      if (!b || !b.length || 1 == b.length && 1E-6 > b.end(0) - b.start(0)) return 0;for (var d = 0, e = b.length - 1; 0 <= e && b.end(e) > c; --e) {
        d += b.end(e) - Math.max(b.start(e), c);
      }return d;
    }
    function Nc(b) {
      if (!b) return [];for (var c = [], d = 0; d < b.length; d++) {
        c.push({ start: b.start(d), end: b.end(d) });
      }return c;
    };function Oc(b, c, d) {
      this.startTime = b;this.endTime = c;this.payload = d;this.region = new Pc();this.position = null;this.positionAlign = Qc;this.size = 100;this.textAlign = Rc;this.writingDirection = Sc;this.lineInterpretation = Tc;this.line = null;this.lineHeight = "";this.lineAlign = Uc;this.displayAlign = Vc;this.fontSize = this.backgroundColor = this.color = "";this.fontWeight = Wc;this.fontStyle = Xc;this.fontFamily = "";this.textDecoration = [];this.wrapLine = !0;this.id = "";
    }y("shaka.text.Cue", Oc);var Qc = "auto";
    Oc.positionAlign = { LEFT: "line-left", RIGHT: "line-right", CENTER: "center", AUTO: Qc };var Rc = "center",
        Yc = { LEFT: "left", RIGHT: "right", CENTER: Rc, START: "start", END: "end" };Oc.textAlign = Yc;var Vc = "before",
        Zc = { BEFORE: Vc, CENTER: "center", AFTER: "after" };Oc.displayAlign = Zc;var Sc = 0;Oc.writingDirection = { HORIZONTAL_LEFT_TO_RIGHT: Sc, HORIZONTAL_RIGHT_TO_LEFT: 1, VERTICAL_LEFT_TO_RIGHT: 2, VERTICAL_RIGHT_TO_LEFT: 3 };var Tc = 0;Oc.lineInterpretation = { LINE_NUMBER: Tc, PERCENTAGE: 1 };var Uc = "center",
        $c = { CENTER: Uc, START: "start", END: "end" };
    Oc.lineAlign = $c;var Wc = 400;Oc.fontWeight = { NORMAL: Wc, BOLD: 700 };var Xc = "normal",
        ad = { NORMAL: Xc, ITALIC: "italic", OBLIQUE: "oblique" };Oc.fontStyle = ad;Oc.textDecoration = { UNDERLINE: "underline", LINE_THROUGH: "lineThrough", OVERLINE: "overline" };function Pc() {
      this.id = "";this.regionAnchorY = this.regionAnchorX = this.viewportAnchorY = this.viewportAnchorX = 0;this.height = this.width = 100;this.viewportAnchorUnits = this.widthUnits = this.heightUnits = bd;this.scroll = cd;
    }y("shaka.text.CueRegion", Pc);var bd = 1;
    Pc.units = { PX: 0, PERCENTAGE: bd, LINES: 2 };var cd = "";Pc.scrollMode = { NONE: cd, UP: "up" };function dd(b, c) {
      if (0 == c.length) return b;var d = c.map(function (b) {
        return new Na(b);
      });return b.map(function (b) {
        return new Na(b);
      }).map(function (b) {
        return d.map(b.resolve.bind(b));
      }).reduce(H.Zb, []).map(function (b) {
        return b.toString();
      });
    }function ed(b, c) {
      return { keySystem: b, licenseServerUri: "", distinctiveIdentifierRequired: !1, persistentStateRequired: !1, audioRobustness: "", videoRobustness: "", serverCertificate: null, initData: c || [], keyIds: [] };
    }var fd = { Rd: "video", Md: "audio", Oa: "text", Vf: "application" },
        gd = 1 / 15;function hd() {
      this.a = new muxjs.mp4.Transmuxer({ keepOriginalTimestamps: !0 });this.b = null;this.g = [];this.c = [];this.f = !1;this.a.on("data", this.i.bind(this));this.a.on("done", this.h.bind(this));
    }hd.prototype.destroy = function () {
      this.a.dispose();this.a = null;return Promise.resolve();
    };function id(b, c) {
      return window.muxjs && "mp2t" == b.split(";")[0].split("/")[1] ? c ? MediaSource.isTypeSupported(jd(c, b)) : MediaSource.isTypeSupported(jd("audio", b)) || MediaSource.isTypeSupported(jd("video", b)) : !1;
    }
    function jd(b, c) {
      var d = c.replace("mp2t", "mp4");"audio" == b && (d = d.replace("video", "audio"));var e = /avc1\.(66|77|100)\.(\d+)/.exec(d);if (e) {
        var f = "avc1.",
            g = e[1],
            h = Number(e[2]);f = ("66" == g ? f + "4200" : "77" == g ? f + "4d00" : f + "6400") + (h >> 4).toString(16);f += (h & 15).toString(16);d = d.replace(e[0], f);
      }return d;
    }function kd(b, c) {
      b.f = !0;b.b = new z();b.g = [];b.c = [];var d = new Uint8Array(c);b.a.push(d);b.a.flush();b.f && b.b.reject(new A(2, 3, 3018));return b.b;
    }
    hd.prototype.i = function (b) {
      for (var c = 0; c < b.captions.length; c++) {
        var d = b.captions[c];this.c.push(new Oc(d.startTime, d.endTime, d.text));
      }c = new Uint8Array(b.data.byteLength + b.initSegment.byteLength);c.set(b.initSegment, 0);c.set(b.data, b.initSegment.byteLength);this.g.push(c);
    };hd.prototype.h = function () {
      var b = { data: cc.apply(null, this.g), cues: this.c };this.b.resolve(b);this.f = !1;
    };function ld(b) {
      this.g = null;this.c = b;this.f = this.m = 0;this.h = Infinity;this.b = this.a = null;this.j = "";this.i = new Map();
    }var md = {};y("shaka.text.TextEngine.registerParser", function (b, c) {
      md[b] = c;
    });y("shaka.text.TextEngine.unregisterParser", function (b) {
      delete md[b];
    });function nd(b) {
      return md[b] || window.muxjs && "application/cea-608" == b ? !0 : !1;
    }ld.prototype.destroy = function () {
      this.c = this.g = null;return Promise.resolve();
    };ld.prototype.Af = function (b) {
      this.c = b;
    };ld.prototype.setDisplayer = ld.prototype.Af;
    function od(b, c) {
      "application/cea-608" != c && (b.g = new md[c]());
    }ld.prototype.gc = function (b) {
      var c = { periodStart: 0, segmentStart: null, segmentEnd: 0 };try {
        return this.g.parseMedia(new Uint8Array(b), c)[0].startTime;
      } catch (d) {
        throw new A(2, 2, 2009, d);
      }
    };
    function pd(b, c, d, e) {
      return Promise.resolve().then(function () {
        if (this.g && this.c) if (null == d || null == e) this.g.parseInit(new Uint8Array(c));else {
          var b = { periodStart: this.m, segmentStart: d, segmentEnd: e };b = this.g.parseMedia(new Uint8Array(c), b).filter(function (b) {
            return b.startTime >= this.f && b.startTime < this.h;
          }.bind(this));this.c.append(b);null == this.a && (this.a = Math.max(d, this.f));this.b = Math.min(e, this.h);
        }
      }.bind(b));
    }
    ld.prototype.remove = function (b, c) {
      return Promise.resolve().then(function () {
        !this.c || !this.c.remove(b, c) || null == this.a || c <= this.a || b >= this.b || (b <= this.a && c >= this.b ? this.a = this.b = null : b <= this.a && c < this.b ? this.a = c : b > this.a && c >= this.b && (this.b = b));
      }.bind(this));
    };ld.prototype.Mc = function (b) {
      this.c.append(b);
    };ld.prototype.appendCues = ld.prototype.Mc;
    ld.prototype.Tb = function (b, c) {
      this.j = b;var d = this.i.get(b);if (d) for (var e = q(d.keys()), f = e.next(); !f.done; f = e.next()) {
        if (f = d.get(f.value)) f = f.filter(function (b) {
          return b.endTime <= c;
        }), this.c.append(f);
      }
    };ld.prototype.setSelectedClosedCaptionId = ld.prototype.Tb;
    function qd(b, c, d, e) {
      var f = d + " " + e,
          g = new Map();c = q(c);for (var h = c.next(); !h.done; h = c.next()) {
        var k = h.value;h = k.stream;g.has(h) || g.set(h, new Map());g.get(h).has(f) || g.get(h).set(f, []);k = new Oc(k.startTime, k.endTime, k.text);k.startTime >= b.f && k.startTime < b.h && (g.get(h).get(f).push(k), h == b.j && b.c.append([k]));
      }f = q(g.keys());for (c = f.next(); !c.done; c = f.next()) {
        for (c = c.value, b.i.has(c) || b.i.set(c, new Map()), h = q(g.get(c).keys()), k = h.next(); !k.done; k = h.next()) {
          k = k.value;var l = g.get(c).get(k);b.i.get(c).set(k, l);
        }
      }b.a = null == b.a ? Math.max(d, b.f) : Math.min(b.a, Math.max(d, b.f));b.b = Math.max(b.b, Math.min(e, b.h));
    };function rd(b) {
      this.f = b;this.u = null;this.b = {};this.a = null;this.c = {};this.i = new Cb();this.s = !1;this.j = {};this.o = !1;this.h = null;this.B = [];this.v = {};b = this.m = new z();var c = new MediaSource();Fb(this.i, c, "sourceopen", b.resolve);this.f.src = window.URL.createObjectURL(c);this.g = c;
    }function sd(b) {
      var c = Kb(b.mimeType, b.codecs),
          d = Lb(b);return nd(c) || MediaSource.isTypeSupported(d) || id(c, b.type);
    }
    function td() {
      var b = {};'video/mp4; codecs="avc1.42E01E",video/mp4; codecs="avc3.42E01E",video/mp4; codecs="hev1.1.6.L93.90",video/mp4; codecs="hvc1.1.6.L93.90",video/mp4; codecs="hev1.2.4.L153.B0"; eotf="smpte2084",video/mp4; codecs="hvc1.2.4.L153.B0"; eotf="smpte2084",video/mp4; codecs="vp9",video/mp4; codecs="vp09.00.10.08",audio/mp4; codecs="mp4a.40.2",audio/mp4; codecs="ac-3",audio/mp4; codecs="ec-3",audio/mp4; codecs="opus",audio/mp4; codecs="flac",video/webm; codecs="vp8",video/webm; codecs="vp9",video/webm; codecs="vp09.00.10.08",audio/webm; codecs="vorbis",audio/webm; codecs="opus",video/mp2t; codecs="avc1.42E01E",video/mp2t; codecs="avc3.42E01E",video/mp2t; codecs="hvc1.1.6.L93.90",video/mp2t; codecs="mp4a.40.2",video/mp2t; codecs="ac-3",video/mp2t; codecs="ec-3",text/vtt,application/mp4; codecs="wvtt",application/ttml+xml,application/mp4; codecs="stpp"'.split(",").forEach(function (c) {
        b[c] = nd(c) || MediaSource.isTypeSupported(c) || id(c);var d = c.split(";")[0];b[d] = b[d] || b[c];
      });return b;
    }n = rd.prototype;
    n.destroy = function () {
      this.s = !0;var b = [],
          c;for (c in this.c) {
        var d = this.c[c],
            e = d[0];this.c[c] = d.slice(0, 1);e && b.push(e.p["catch"](H.Ga));for (e = 1; e < d.length; ++e) {
          d[e].p["catch"](H.Ga), d[e].p.reject();
        }
      }this.a && b.push(this.a.destroy());for (var f in this.j) {
        b.push(this.j[f].destroy());
      }return Promise.all(b).then(function () {
        var b = this.i ? this.i.destroy() : null;this.f && (this.f.removeAttribute("src"), this.f.load());this.u = this.a = this.g = this.f = this.i = null;this.b = {};this.j = {};this.h = null;this.B = [];this.v = {};this.c = {};return b;
      }.bind(this));
    };n.init = function (b, c) {
      var d = this;return r(function f() {
        var g;return v(f, function (f) {
          switch (f.l) {case 1:
              return g = fd, u(f, d.m, 2);case 2:
              b.forEach(function (b, f) {
                var h = Kb(b.mimeType, b.codecs);f == g.Oa ? ud(d, h) : (!c && MediaSource.isTypeSupported(h) || !id(h, f) || (d.j[f] = new hd(), h = jd(f, h)), h = d.g.addSourceBuffer(h), G(d.i, h, "error", d.Jf.bind(d, f)), G(d.i, h, "updateend", d.Xa.bind(d, f)), d.b[f] = h, d.c[f] = []);
              }), f.l = 0;}
        });
      });
    };function ud(b, c) {
      b.a || (b.a = new ld(b.u));od(b.a, c);
    }
    function vd(b, c) {
      if ("text" == c) var d = b.a.a;else d = wd(b, c), d = !d || 1 == d.length && 1E-6 > d.end(0) - d.start(0) ? null : 1 == d.length && 0 > d.start(0) ? 0 : d.length ? d.start(0) : null;return d;
    }function xd(b, c) {
      return "text" == c ? b.a.b : Gc(wd(b, c));
    }function yd(b, c, d) {
      if ("text" == c) return b = b.a, null == b.b || b.b < d ? 0 : b.b - Math.max(d, b.a);b = wd(b, c);return Mc(b, d);
    }n.dc = function () {
      var b = this.a && null != this.a.a ? [{ start: this.a.a, end: this.a.b }] : [];return { total: Nc(this.f.buffered), audio: Nc(wd(this, "audio")), video: Nc(wd(this, "video")), text: b };
    };
    function wd(b, c) {
      try {
        return b.b[c].buffered;
      } catch (d) {
        return null;
      }
    }
    function zd(b, c, d, e, f, g) {
      if ("text" == c) return pd(b.a, d, e, f);if (b.j[c]) return kd(b.j[c], d).then(function (b) {
        this.a || ud(this, "text/vtt");this.o && this.a.Mc(b.cues);return Ad(this, c, this.Fd.bind(this, c, b.data.buffer));
      }.bind(b));g && window.muxjs && (b.a || ud(b, "text/vtt"), null == e && null == f ? (b.h = new muxjs.mp4.CaptionParser(), e = muxjs.mp4.probe, f = new Uint8Array(d), b.B = e.videoTrackIds(f), b.v = e.timescale(f), b.h.init()) : (g = new Uint8Array(d), (g = b.h.parse(g, b.B, b.v)) && (g = g.captions) && 0 < g.length && qd(b.a, g, e, f), b.h.clearParsedCaptions()));
      return Ad(b, c, b.Fd.bind(b, c, d));
    }n.Tb = function (b) {
      var c = xd(this, "video") || 0;this.a.Tb(b, c);
    };n.remove = function (b, c, d) {
      return "text" == b ? this.a.remove(c, d) : Ad(this, b, this.Gd.bind(this, b, c, d));
    };function Bd(b, c) {
      if ("text" == c) {
        if (!b.a) return Promise.resolve();b.h && b.h.resetCaptionStream();return b.a.remove(0, Infinity);
      }return Ad(b, c, b.Gd.bind(b, c, 0, b.g.duration));
    }n.flush = function (b) {
      return "text" == b ? Promise.resolve() : Ad(this, b, this.ge.bind(this, b));
    };
    function Cd(b, c, d, e, f) {
      return "text" == c ? (b.a.m = d, b = b.a, b.f = e, b.h = f, Promise.resolve()) : Promise.all([Ad(b, c, b.Sd.bind(b, c)), Ad(b, c, b.Bf.bind(b, c, d)), Ad(b, c, b.yf.bind(b, c, e, f))]);
    }n.endOfStream = function (b) {
      return Dd(this, function () {
        b ? this.g.endOfStream(b) : this.g.endOfStream();
      }.bind(this));
    };n.la = function (b) {
      return Dd(this, function () {
        this.g.duration = b;
      }.bind(this));
    };n.S = function () {
      return this.g.duration;
    };n.Fd = function (b, c) {
      this.b[b].appendBuffer(c);
    };
    n.Gd = function (b, c, d) {
      d <= c ? this.Xa(b) : this.b[b].remove(c, d);
    };n.Sd = function (b) {
      var c = this.b[b].appendWindowStart,
          d = this.b[b].appendWindowEnd;this.b[b].abort();this.b[b].appendWindowStart = c;this.b[b].appendWindowEnd = d;this.Xa(b);
    };n.ge = function (b) {
      this.f.currentTime -= .001;this.Xa(b);
    };n.Bf = function (b, c) {
      0 > c && (c += .001);this.b[b].timestampOffset = c;this.Xa(b);
    };n.yf = function (b, c, d) {
      this.b[b].appendWindowStart = 0;this.b[b].appendWindowEnd = d;this.b[b].appendWindowStart = c;this.Xa(b);
    };
    n.Jf = function (b) {
      this.c[b][0].p.reject(new A(2, 3, 3014, this.f.error ? this.f.error.code : 0));
    };n.Xa = function (b) {
      var c = this.c[b][0];c && (c.p.resolve(), Ed(this, b));
    };function Ad(b, c, d) {
      if (b.s) return Promise.reject();d = { start: d, p: new z() };b.c[c].push(d);if (1 == b.c[c].length) try {
        d.start();
      } catch (e) {
        "QuotaExceededError" == e.name ? d.p.reject(new A(2, 3, 3017, c)) : d.p.reject(new A(2, 3, 3015, e)), Ed(b, c);
      }return d.p;
    }
    function Dd(b, c) {
      if (b.s) return Promise.reject();var d = [],
          e;for (e in b.b) {
        var f = new z(),
            g = { start: function (b) {
            b.resolve();
          }.bind(null, f), p: f };b.c[e].push(g);d.push(f);1 == b.c[e].length && g.start();
      }return Promise.all(d).then(function () {
        try {
          c();
        } catch (l) {
          var b = Promise.reject(new A(2, 3, 3015, l));
        }for (var d in this.b) {
          Ed(this, d);
        }return b;
      }.bind(b), function () {
        return Promise.reject();
      }.bind(b));
    }function Ed(b, c) {
      b.c[c].shift();var d = b.c[c][0];if (d) try {
        d.start();
      } catch (e) {
        d.p.reject(new A(2, 3, 3015, e)), Ed(b, c);
      }
    };function Fd(b, c) {
      b = I(b);c = I(c);return b.split("-")[0] == c.split("-")[0];
    }function Gd(b, c) {
      b = I(b);c = I(c);var d = b.split("-"),
          e = c.split("-");return d[0] == e[0] && 1 == d.length && 2 == e.length;
    }function I(b) {
      var c = b.split("-");b = c[0] || "";c = c[1] || "";b = b.toLowerCase();b = Hd.get(b) || b;return (c = c.toUpperCase()) ? b + "-" + c : b;
    }function Id(b) {
      return b.language ? I(b.language) : b.audio && b.audio.language ? I(b.audio.language) : b.video && b.video.language ? I(b.video.language) : "und";
    }
    function Jd(b, c) {
      for (var d = I(b), e = new Set(), f = q(c), g = f.next(); !g.done; g = f.next()) {
        e.add(I(g.value));
      }f = q(e);for (g = f.next(); !g.done; g = f.next()) {
        if (g = g.value, g == d) return g;
      }f = q(e);for (g = f.next(); !g.done; g = f.next()) {
        if (g = g.value, Gd(g, d)) return g;
      }f = q(e);for (g = f.next(); !g.done; g = f.next()) {
        var h = g = g.value,
            k = d;h = I(h);k = I(k);h = h.split("-");k = k.split("-");if (2 == h.length && 2 == k.length && h[0] == k[0]) return g;
      }e = q(e);for (g = e.next(); !g.done; g = e.next()) {
        if (f = g.value, Gd(d, f)) return f;
      }return null;
    }
    var Hd = new Map([["aar", "aa"], ["abk", "ab"], ["afr", "af"], ["aka", "ak"], ["alb", "sq"], ["amh", "am"], ["ara", "ar"], ["arg", "an"], ["arm", "hy"], ["asm", "as"], ["ava", "av"], ["ave", "ae"], ["aym", "ay"], ["aze", "az"], ["bak", "ba"], ["bam", "bm"], ["baq", "eu"], ["bel", "be"], ["ben", "bn"], ["bih", "bh"], ["bis", "bi"], ["bod", "bo"], ["bos", "bs"], ["bre", "br"], ["bul", "bg"], ["bur", "my"], ["cat", "ca"], ["ces", "cs"], ["cha", "ch"], ["che", "ce"], ["chi", "zh"], ["chu", "cu"], ["chv", "cv"], ["cor", "kw"], ["cos", "co"], ["cre", "cr"], ["cym", "cy"], ["cze", "cs"], ["dan", "da"], ["deu", "de"], ["div", "dv"], ["dut", "nl"], ["dzo", "dz"], ["ell", "el"], ["eng", "en"], ["epo", "eo"], ["est", "et"], ["eus", "eu"], ["ewe", "ee"], ["fao", "fo"], ["fas", "fa"], ["fij", "fj"], ["fin", "fi"], ["fra", "fr"], ["fre", "fr"], ["fry", "fy"], ["ful", "ff"], ["geo", "ka"], ["ger", "de"], ["gla", "gd"], ["gle", "ga"], ["glg", "gl"], ["glv", "gv"], ["gre", "el"], ["grn", "gn"], ["guj", "gu"], ["hat", "ht"], ["hau", "ha"], ["heb", "he"], ["her", "hz"], ["hin", "hi"], ["hmo", "ho"], ["hrv", "hr"], ["hun", "hu"], ["hye", "hy"], ["ibo", "ig"], ["ice", "is"], ["ido", "io"], ["iii", "ii"], ["iku", "iu"], ["ile", "ie"], ["ina", "ia"], ["ind", "id"], ["ipk", "ik"], ["isl", "is"], ["ita", "it"], ["jav", "jv"], ["jpn", "ja"], ["kal", "kl"], ["kan", "kn"], ["kas", "ks"], ["kat", "ka"], ["kau", "kr"], ["kaz", "kk"], ["khm", "km"], ["kik", "ki"], ["kin", "rw"], ["kir", "ky"], ["kom", "kv"], ["kon", "kg"], ["kor", "ko"], ["kua", "kj"], ["kur", "ku"], ["lao", "lo"], ["lat", "la"], ["lav", "lv"], ["lim", "li"], ["lin", "ln"], ["lit", "lt"], ["ltz", "lb"], ["lub", "lu"], ["lug", "lg"], ["mac", "mk"], ["mah", "mh"], ["mal", "ml"], ["mao", "mi"], ["mar", "mr"], ["may", "ms"], ["mkd", "mk"], ["mlg", "mg"], ["mlt", "mt"], ["mon", "mn"], ["mri", "mi"], ["msa", "ms"], ["mya", "my"], ["nau", "na"], ["nav", "nv"], ["nbl", "nr"], ["nde", "nd"], ["ndo", "ng"], ["nep", "ne"], ["nld", "nl"], ["nno", "nn"], ["nob", "nb"], ["nor", "no"], ["nya", "ny"], ["oci", "oc"], ["oji", "oj"], ["ori", "or"], ["orm", "om"], ["oss", "os"], ["pan", "pa"], ["per", "fa"], ["pli", "pi"], ["pol", "pl"], ["por", "pt"], ["pus", "ps"], ["que", "qu"], ["roh", "rm"], ["ron", "ro"], ["rum", "ro"], ["run", "rn"], ["rus", "ru"], ["sag", "sg"], ["san", "sa"], ["sin", "si"], ["slk", "sk"], ["slo", "sk"], ["slv", "sl"], ["sme", "se"], ["smo", "sm"], ["sna", "sn"], ["snd", "sd"], ["som", "so"], ["sot", "st"], ["spa", "es"], ["sqi", "sq"], ["srd", "sc"], ["srp", "sr"], ["ssw", "ss"], ["sun", "su"], ["swa", "sw"], ["swe", "sv"], ["tah", "ty"], ["tam", "ta"], ["tat", "tt"], ["tel", "te"], ["tgk", "tg"], ["tgl", "tl"], ["tha", "th"], ["tib", "bo"], ["tir", "ti"], ["ton", "to"], ["tsn", "tn"], ["tso", "ts"], ["tuk", "tk"], ["tur", "tr"], ["twi", "tw"], ["uig", "ug"], ["ukr", "uk"], ["urd", "ur"], ["uzb", "uz"], ["ven", "ve"], ["vie", "vi"], ["vol", "vo"], ["wel", "cy"], ["wln", "wa"], ["wol", "wo"], ["xho", "xh"], ["yid", "yi"], ["yor", "yo"], ["zha", "za"], ["zho", "zh"], ["zul", "zu"]]);var J = { nc: function nc(b, c, d) {
        function e(b, c, d) {
          return b >= c && b <= d;
        }var f = b.video;return f && f.width && f.height && !(e(f.width, c.minWidth, Math.min(c.maxWidth, d.width)) && e(f.height, c.minHeight, Math.min(c.maxHeight, d.height)) && e(f.width * f.height, c.minPixels, c.maxPixels)) || !e(b.bandwidth, c.minBandwidth, c.maxBandwidth) ? !1 : !0;
      }, Nc: function Nc(b, c, d) {
        var e = !1;b.forEach(function (b) {
          var f = b.allowedByApplication;b.allowedByApplication = J.nc(b, c, d);f != b.allowedByApplication && (e = !0);
        });return e;
      }, filterNewPeriod: function filterNewPeriod(b, c, d, e) {
        e.variants = e.variants.filter(function (e) {
          if (b && b.P && !Dc(b, e)) return !1;var f = e.audio;e = e.video;return f && !sd(f) || e && !sd(e) || f && c && !J.Oc(f, c) || e && d && !J.Oc(e, d) ? !1 : !0;
        });e.textStreams = e.textStreams.filter(function (b) {
          return nd(Kb(b.mimeType, b.codecs));
        });
      }, Oc: function Oc(b, c) {
        return b.mimeType != c.mimeType || b.codecs.split(".")[0] != c.codecs.split(".")[0] ? !1 : !0;
      }, Ld: function Ld(b) {
        var c = b.audio,
            d = b.video,
            e = c ? c.codecs : null,
            f = d ? d.codecs : null,
            g = [];f && g.push(f);e && g.push(e);var h = [];d && h.push(d.mimeType);c && h.push(c.mimeType);
        h = h[0] || null;var k = [];c && k.push(c.kind);d && k.push(d.kind);k = k[0] || null;var l = new Set();c && c.roles.forEach(function (b) {
          return l.add(b);
        });d && d.roles.forEach(function (b) {
          return l.add(b);
        });b = { id: b.id, active: !1, type: "variant", bandwidth: b.bandwidth, language: b.language, label: null, kind: k, width: null, height: null, frameRate: null, mimeType: h, codecs: g.join(", "), audioCodec: e, videoCodec: f, primary: b.primary, roles: Array.from(l), videoId: null, audioId: null, channelsCount: null, audioBandwidth: null, videoBandwidth: null, originalVideoId: null,
          originalAudioId: null, originalTextId: null };d && (b.videoId = d.id, b.originalVideoId = d.originalId, b.width = d.width || null, b.height = d.height || null, b.frameRate = d.frameRate || null, b.videoBandwidth = d.bandwidth || null);c && (b.audioId = c.id, b.originalAudioId = c.originalId, b.channelsCount = c.channelsCount, b.audioBandwidth = c.bandwidth || null, b.label = c.label);return b;
      }, Hd: function Hd(b) {
        return { id: b.id, active: !1, type: "text", bandwidth: 0, language: b.language, label: b.label, kind: b.kind || null, width: null, height: null, frameRate: null,
          mimeType: b.mimeType, codecs: b.codecs || null, audioCodec: null, videoCodec: null, primary: b.primary, roles: b.roles, videoId: null, audioId: null, channelsCount: null, audioBandwidth: null, videoBandwidth: null, originalVideoId: null, originalAudioId: null, originalTextId: b.originalId };
      }, Ta: function Ta(b, c, d) {
        return J.$c(b.variants).map(function (b) {
          var e = J.Ld(b);b.video && b.audio ? e.active = d == b.video.id && c == b.audio.id : b.video ? e.active = d == b.video.id : b.audio && (e.active = c == b.audio.id);return e;
        });
      }, Sa: function Sa(b, c) {
        return b.textStreams.map(function (b) {
          var d = J.Hd(b);d.active = c == b.id;return d;
        });
      }, fe: function fe(b, c) {
        for (var d = 0; d < b.variants.length; d++) {
          if (b.variants[d].id == c.id) return b.variants[d];
        }return null;
      }, ee: function ee(b, c) {
        for (var d = 0; d < b.textStreams.length; d++) {
          if (b.textStreams[d].id == c.id) return b.textStreams[d];
        }return null;
      }, mb: function mb(b) {
        return b.allowedByApplication && b.allowedByKeySystem;
      }, $c: function $c(b) {
        return b.filter(function (b) {
          return J.mb(b);
        });
      }, Wc: function Wc(b, c) {
        var d = b.filter(function (b) {
          return b.audio && b.audio.channelsCount;
        }).reduce(function (b, c) {
          var d = c.audio.channelsCount;b[d] ? b[d].push(c) : b[d] = [c];return b;
        }, {}),
            e = Object.keys(d);if (0 == e.length) return b;var f = e.filter(function (b) {
          return b <= c;
        });return f.length ? d[Math.max.apply(null, f)] : d[Math.min.apply(null, e)];
      }, Hb: function Hb(b, c, d) {
        var e = b,
            f = b.filter(function (b) {
          return b.primary;
        });f.length && (e = f);var g = e.length ? e[0].language : "";e = e.filter(function (b) {
          return b.language == g;
        });if (c) {
          var h = Jd(I(c), b.map(function (b) {
            return b.language;
          }));h && (e = b.filter(function (b) {
            return I(b.language) == h;
          }));
        }if (d) {
          if (b = J.Vc(e, d), b.length) return b;
        } else if (b = e.filter(function (b) {
          return 0 == b.roles.length;
        }), b.length) return b;b = e.map(function (b) {
          return b.roles;
        }).reduce(H.Zb, []);return b.length ? J.Vc(e, b[0]) : e;
      }, Vc: function Vc(b, c) {
        return b.filter(function (b) {
          return b.roles.includes(c);
        });
      }, hc: function hc(b, c, d) {
        for (var e = 0; e < d.length; e++) {
          if (d[e].audio == b && d[e].video == c) return d[e];
        }return null;
      }, ve: function ve(b, c, d) {
        function e(b, c) {
          return null == b ? null == c : c.id == b;
        }for (var f = 0; f < d.length; f++) {
          if (e(b, d[f].audio) && e(c, d[f].video)) return d[f];
        }return null;
      }, pa: function pa(b, c) {
        for (var d = b.periods.length - 1; 0 < d; --d) {
          if (c + gd >= b.periods[d].startTime) return d;
        }return 0;
      }, oa: function oa(b, c) {
        for (var d = 0; d < b.periods.length; ++d) {
          var e = b.periods[d];if ("text" == c.type) for (var f = 0; f < e.textStreams.length; ++f) {
            if (e.textStreams[f] == c) return d;
          } else for (f = 0; f < e.variants.length; ++f) {
            var g = e.variants[f];if (g.audio == c || g.video == c || g.video && g.video.trickModeVideo == c) return d;
          }
        }return -1;
      }, de: function de(b, c) {
        for (var d = 0; d < b.periods.length; ++d) {
          for (var e = b.periods[d], f = 0; f < e.variants.length; ++f) {
            if (e.variants[f] == c) return d;
          }
        }return -1;
      }, Ae: function Ae(b) {
        return "audio" == b.type;
      }, De: function De(b) {
        return "video" == b.type;
      }, Yc: function Yc(b) {
        var c = [];b.periods.forEach(function (b) {
          b.variants.forEach(function (b) {
            c.push(b);
          });
        });return c;
      }, we: function we(b) {
        var c = [];b.audio && c.push(b.audio);b.video && c.push(b.video);return c;
      }, $f: function $f(b) {
        return J.Ae(b) ? "type=audio codecs=" + b.codecs + " bandwidth=" + b.bandwidth + " channelsCount=" + b.channelsCount : J.De(b) ? "type=video codecs=" + b.codecs + " bandwidth=" + b.bandwidth + " frameRate=" + b.frameRate + " width=" + b.width + " height=" + b.height : "unexpected stream type";
      } };function K() {
      this.h = null;this.f = !1;this.b = new Ja();this.c = [];this.i = !1;this.a = this.g = null;
    }y("shaka.abr.SimpleAbrManager", K);K.prototype.stop = function () {
      this.h = null;this.f = !1;this.c = [];this.g = null;
    };K.prototype.stop = K.prototype.stop;K.prototype.init = function (b) {
      this.h = b;
    };K.prototype.init = K.prototype.init;
    K.prototype.chooseVariant = function () {
      var b = Kd(this.a.restrictions, this.c),
          c = this.b.getBandwidthEstimate(this.a.defaultBandwidthEstimate);this.c.length && !b.length && (b = Kd(null, this.c), b = [b[0]]);for (var d = b[0] || null, e = 0; e < b.length; ++e) {
        var f = b[e],
            g = (b[e + 1] || { bandwidth: Infinity }).bandwidth / this.a.bandwidthUpgradeTarget;c >= f.bandwidth / this.a.bandwidthDowngradeTarget && c <= g && (d = f);
      }this.g = Date.now();return d;
    };K.prototype.chooseVariant = K.prototype.chooseVariant;K.prototype.enable = function () {
      this.f = !0;
    };
    K.prototype.enable = K.prototype.enable;K.prototype.disable = function () {
      this.f = !1;
    };K.prototype.disable = K.prototype.disable;K.prototype.segmentDownloaded = function (b, c) {
      var d = this.b;if (!(16E3 > c)) {
        var e = 8E3 * c / b,
            f = b / 1E3;d.a += c;Ha(d.b, f, e);Ha(d.c, f, e);
      }if (null != this.g && this.f) a: {
        if (!this.i) {
          if (!(128E3 <= this.b.a)) break a;this.i = !0;
        } else if (Date.now() - this.g < 1E3 * this.a.switchInterval) break a;d = this.chooseVariant();this.b.getBandwidthEstimate(this.a.defaultBandwidthEstimate);this.h(d);
      }
    };
    K.prototype.segmentDownloaded = K.prototype.segmentDownloaded;K.prototype.getBandwidthEstimate = function () {
      return this.b.getBandwidthEstimate(this.a.defaultBandwidthEstimate);
    };K.prototype.getBandwidthEstimate = K.prototype.getBandwidthEstimate;K.prototype.setVariants = function (b) {
      this.c = b;
    };K.prototype.setVariants = K.prototype.setVariants;K.prototype.configure = function (b) {
      this.a = b;
    };K.prototype.configure = K.prototype.configure;
    function Kd(b, c) {
      b && (c = c.filter(function (c) {
        return J.nc(c, b, { width: Infinity, height: Infinity });
      }));return c.sort(function (b, c) {
        return b.bandwidth - c.bandwidth;
      });
    };var Ld = "ended play playing pause pausing ratechange seeked seeking timeupdate volumechange resize".split(" "),
        Md = "buffered currentTime duration ended loop muted paused playbackRate seeking videoHeight videoWidth volume".split(" "),
        Nd = ["loop", "playbackRate"],
        Od = ["pause", "play"],
        Pd = "adaptation buffering emsg error loading streaming texttrackvisibility timelineregionadded timelineregionenter timelineregionexit trackschanged unloading variantchanged textchanged".split(" "),
        Qd = { getAssetUri: 2, getAudioLanguages: 2,
      getAudioLanguagesAndRoles: 2, getBufferedInfo: 2, getConfiguration: 2, getExpiration: 2, getPlaybackRate: 2, getTextLanguages: 2, getTextLanguagesAndRoles: 2, getTextTracks: 2, getStats: 5, usingEmbeddedTextTrack: 2, getVariantTracks: 2, isAudioOnly: 10, isBuffering: 1, isInProgress: 1, isLive: 10, isTextTrackVisible: 1, keySystem: 10, seekRange: 1 },
        Rd = { getPlayheadTimeAsDate: 1, getPresentationStartTimeAsDate: 20 },
        Sd = [["getConfiguration", "configure"]],
        Td = [["isTextTrackVisible", "setTextTrackVisibility"]],
        Ud = "addTextTrack cancelTrickPlay configure resetConfiguration retryStreaming selectAudioLanguage selectEmbeddedTextTrack selectTextLanguage selectTextTrack selectVariantTrack setTextTrackVisibility trickPlay".split(" "),
        Vd = ["attach", "detach", "load", "unload"];
    function Wd(b) {
      return JSON.stringify(b, function (b, d) {
        if ("function" != typeof d) {
          if (d instanceof Event || d instanceof D) {
            var c = {},
                f;for (f in d) {
              var g = d[f];g && "object" == (typeof g === "undefined" ? "undefined" : _typeof(g)) ? "detail" == f && (c[f] = g) : f in Event || (c[f] = g);
            }return c;
          }if (d instanceof TimeRanges) for (c = { __type__: "TimeRanges", length: d.length, start: [], end: [] }, f = 0; f < d.length; ++f) {
            c.start.push(d.start(f)), c.end.push(d.end(f));
          } else c = "number" == typeof d ? isNaN(d) ? "NaN" : isFinite(d) ? d : 0 > d ? "-Infinity" : "Infinity" : d;return c;
        }
      });
    }
    function Xd(b) {
      return JSON.parse(b, function (b, d) {
        return "NaN" == d ? NaN : "-Infinity" == d ? -Infinity : "Infinity" == d ? Infinity : d && "object" == (typeof d === "undefined" ? "undefined" : _typeof(d)) && "TimeRanges" == d.__type__ ? Yd(d) : d;
      });
    }function Yd(b) {
      return { length: b.length, start: function start(c) {
          return b.start[c];
        }, end: function end(c) {
          return b.end[c];
        } };
    };function Zd(b, c, d, e, f, g) {
      this.M = b;this.g = c;this.P = d;this.j = !1;this.B = e;this.J = f;this.u = g;this.b = this.h = !1;this.v = "";this.i = null;this.m = this.jd.bind(this);this.o = this.Le.bind(this);this.a = { video: {}, player: {} };this.s = 0;this.c = {};this.f = null;
    }var $d = !1,
        ae = null;n = Zd.prototype;n.destroy = function () {
      be(this);ae && ce(this);this.J = this.B = this.g = null;this.b = this.h = !1;this.o = this.m = this.f = this.c = this.a = this.i = null;return Promise.resolve();
    };n.aa = function () {
      return this.b;
    };n.xc = function () {
      return this.v;
    };
    n.init = function () {
      if (window.chrome && chrome.cast && chrome.cast.isAvailable) {
        delete window.__onGCastApiAvailable;this.h = !0;this.g();var b = new chrome.cast.SessionRequest(this.M);b = new chrome.cast.ApiConfig(b, this.kd.bind(this), this.Re.bind(this), "origin_scoped");chrome.cast.initialize(b, function () {}, function () {});$d && setTimeout(this.g.bind(this), 20);(b = ae) && b.status != chrome.cast.SessionStatus.STOPPED ? this.kd(b) : ae = null;
      } else window.__onGCastApiAvailable = function (b) {
        b && this.init();
      }.bind(this);
    };
    n.Bc = function (b) {
      this.i = b;this.b && de({ type: "appData", appData: this.i });
    };n.cast = function (b) {
      if (!this.h) return Promise.reject(new A(1, 8, 8E3));if (!$d) return Promise.reject(new A(1, 8, 8001));if (this.b) return Promise.reject(new A(1, 8, 8002));this.f = new z();chrome.cast.requestSession(this.uc.bind(this, b), this.hd.bind(this));return this.f;
    };n.Jb = function () {
      this.b && (be(this), ae && (ce(this), ae.stop(function () {}, function () {}), ae = null));
    };
    n.get = function (b, c) {
      if ("video" == b) {
        if (Od.includes(c)) return this.vd.bind(this, b, c);
      } else if ("player" == b) {
        if (Rd[c] && !this.get("player", "isLive")()) return function () {};if (Ud.includes(c)) return this.vd.bind(this, b, c);if (Vd.includes(c)) return this.lf.bind(this, b, c);if (Qd[c]) return this.sd.bind(this, b, c);
      }return this.sd(b, c);
    };n.set = function (b, c, d) {
      this.a[b][c] = d;de({ type: "set", targetName: b, property: c, value: d });
    };
    n.uc = function (b, c) {
      ae = c;c.addUpdateListener(this.m);c.addMessageListener("urn:x-cast:com.google.shaka.v2", this.o);this.jd();de({ type: "init", initState: b, appData: this.i });this.f.resolve();
    };n.hd = function (b) {
      var c = 8003;switch (b.code) {case "cancel":
          c = 8004;break;case "timeout":
          c = 8005;break;case "receiver_unavailable":
          c = 8006;}this.f.reject(new A(2, 8, c, b));
    };n.sd = function (b, c) {
      return this.a[b][c];
    };
    n.vd = function (b, c, d) {
      for (var e = [], f = 2; f < arguments.length; ++f) {
        e[f - 2] = arguments[f];
      }de({ type: "call", targetName: b, methodName: c, args: e });
    };n.lf = function (b, c, d) {
      for (var e = [], f = 2; f < arguments.length; ++f) {
        e[f - 2] = arguments[f];
      }f = new z();var g = this.s.toString();this.s++;this.c[g] = f;de({ type: "asyncCall", targetName: b, methodName: c, args: e, id: g });return f;
    };n.kd = function (b) {
      var c = this.u();this.f = new z();this.j = !0;this.uc(c, b);
    };n.Re = function (b) {
      $d = "available" == b;this.g();
    };
    function ce(b) {
      var c = ae;c.removeUpdateListener(b.m);c.removeMessageListener("urn:x-cast:com.google.shaka.v2", b.o);
    }n.jd = function () {
      var b = ae ? "connected" == ae.status : !1;if (this.b && !b) {
        this.J();for (var c in this.a) {
          this.a[c] = {};
        }be(this);
      }this.v = (this.b = b) ? ae.receiver.friendlyName : "";this.g();
    };function be(b) {
      for (var c in b.c) {
        var d = b.c[c];delete b.c[c];d.reject(new A(1, 7, 7E3));
      }
    }
    n.Le = function (b, c) {
      var d = Xd(c);switch (d.type) {case "event":
          var e = d.event;this.B(d.targetName, new D(e.type, e));break;case "update":
          e = d.update;for (var f in e) {
            d = this.a[f] || {};for (var g in e[f]) {
              d[g] = e[f][g];
            }
          }this.j && (this.P(), this.j = !1);break;case "asyncComplete":
          if (f = d.id, d = d.error, g = this.c[f], delete this.c[f], g) if (d) {
            f = new A(d.severity, d.category, d.code);for (e in d) {
              f[e] = d[e];
            }g.reject(f);
          } else g.resolve();}
    };function de(b) {
      b = Wd(b);ae.sendMessage("urn:x-cast:com.google.shaka.v2", b, function () {}, La);
    };function L(b, c, d) {
      E.call(this);this.c = b;this.b = c;this.i = this.g = this.f = this.j = this.h = null;this.a = new Zd(d, this.Ef.bind(this), this.Ff.bind(this), this.Gf.bind(this), this.Hf.bind(this), this.Zc.bind(this));ee(this);
    }Fa(L, E);y("shaka.cast.CastProxy", L);L.prototype.destroy = function (b) {
      b && this.a && this.a.Jb();b = [this.i ? this.i.destroy() : null, this.b ? this.b.destroy() : null, this.a ? this.a.destroy() : null];this.a = this.i = this.j = this.h = this.b = this.c = null;return Promise.all(b);
    };L.prototype.destroy = L.prototype.destroy;
    L.prototype.xe = function () {
      return this.h;
    };L.prototype.getVideo = L.prototype.xe;L.prototype.pe = function () {
      return this.j;
    };L.prototype.getPlayer = L.prototype.pe;L.prototype.Vd = function () {
      return this.a ? this.a.h && $d : !1;
    };L.prototype.canCast = L.prototype.Vd;L.prototype.aa = function () {
      return this.a ? this.a.aa() : !1;
    };L.prototype.isCasting = L.prototype.aa;L.prototype.xc = function () {
      return this.a ? this.a.xc() : "";
    };L.prototype.receiverName = L.prototype.xc;L.prototype.cast = function () {
      var b = this.Zc();return this.a.cast(b).then(function () {
        if (this.b) return this.b.vb();
      }.bind(this));
    };
    L.prototype.cast = L.prototype.cast;L.prototype.Bc = function (b) {
      this.a.Bc(b);
    };L.prototype.setAppData = L.prototype.Bc;L.prototype.Lf = function () {
      var b = this.a;if (b.b) {
        var c = b.u();chrome.cast.requestSession(b.uc.bind(b, c), b.hd.bind(b));
      }
    };L.prototype.suggestDisconnect = L.prototype.Lf;L.prototype.Jb = function () {
      this.a.Jb();
    };L.prototype.forceDisconnect = L.prototype.Jb;
    function ee(b) {
      b.a.init();b.i = new Cb();Ld.forEach(function (b) {
        G(this.i, this.c, b, this.Tf.bind(this));
      }.bind(b));Pd.forEach(function (b) {
        G(this.i, this.b, b, this.ff.bind(this));
      }.bind(b));b.h = {};for (var c in b.c) {
        Object.defineProperty(b.h, c, { configurable: !1, enumerable: !0, get: b.Sf.bind(b, c), set: b.Uf.bind(b, c) });
      }b.j = {};for (var d in b.b) {
        Object.defineProperty(b.j, d, { configurable: !1, enumerable: !0, get: b.rd.bind(b, d) });
      }b.f = new E();b.f.xb = b.h;b.g = new E();b.g.xb = b.j;
    }n = L.prototype;
    n.Zc = function () {
      var b = { video: {}, player: {}, playerAfterLoad: {}, manifest: this.b.cc(), startTime: null };this.c.pause();Nd.forEach(function (c) {
        b.video[c] = this.c[c];
      }.bind(this));this.c.ended || (b.startTime = this.c.currentTime);Sd.forEach(function (c) {
        var d = c[1];c = this.b[c[0]]();b.player[d] = c;
      }.bind(this));Td.forEach(function (c) {
        var d = c[1];c = this.b[c[0]]();b.playerAfterLoad[d] = c;
      }.bind(this));return b;
    };n.Ef = function () {
      this.dispatchEvent(new D("caststatuschanged"));
    };
    n.Ff = function () {
      this.f.dispatchEvent(new D(this.h.paused ? "pause" : "play"));
    };
    n.Hf = function () {
      var b = this;Sd.forEach(function (b) {
        var c = b[1];b = this.a.get("player", b[0])();this.b[c](b);
      }.bind(this));var c = this.a.get("player", "getAssetUri")(),
          d = this.a.get("video", "ended"),
          e = Promise.resolve(),
          f = this.c.autoplay,
          g = null;d || (g = this.a.get("video", "currentTime"));c && (this.c.autoplay = !1, e = this.b.load(c, g));var h = {};Nd.forEach(function (b) {
        h[b] = this.a.get("video", b);
      }.bind(this));e.then(function () {
        b.c && (Nd.forEach(function (b) {
          this.c[b] = h[b];
        }.bind(b)), Td.forEach(function (b) {
          var c = b[1];b = this.a.get("player", b[0])();this.b[c](b);
        }.bind(b)), b.c.autoplay = f, c && b.c.play());
      }, function (c) {
        b.b.dispatchEvent(new D("error", { detail: c }));
      });
    };n.Sf = function (b) {
      if ("addEventListener" == b) return this.f.addEventListener.bind(this.f);if ("removeEventListener" == b) return this.f.removeEventListener.bind(this.f);if (this.a.aa() && 0 == Object.keys(this.a.a.video).length) {
        var c = this.c[b];if ("function" != typeof c) return c;
      }return this.a.aa() ? this.a.get("video", b) : (b = this.c[b], "function" == typeof b && (b = b.bind(this.c)), b);
    };
    n.Uf = function (b, c) {
      this.a.aa() ? this.a.set("video", b, c) : this.c[b] = c;
    };n.Tf = function (b) {
      this.a.aa() || this.f.dispatchEvent(new D(b.type, b));
    };
    n.rd = function (b) {
      if ("addEventListener" == b) return this.g.addEventListener.bind(this.g);if ("removeEventListener" == b) return this.g.removeEventListener.bind(this.g);if ("getMediaElement" == b) return function () {
        return this.h;
      }.bind(this);if ("getSharedConfiguration" == b) return this.a.get("player", "getConfiguration");if ("getNetworkingEngine" == b) return this.b.gb.bind(this.b);if (this.a.aa()) {
        if ("getManifest" == b || "drmInfo" == b) return function () {
          Ka(b + "() does not work while casting!");return null;
        };if ("getManifestUri" == b) return Ka('"getManifestUri" is deprecated. Please use "getAssetUri".'), this.rd("getAssetUri");if ("attach" == b || "detach" == b) return function () {
          Ka(b + "() does not work while casting!");return Promise.resolve();
        };
      }return this.a.aa() && 0 == Object.keys(this.a.a.video).length && Qd[b] || !this.a.aa() ? this.b[b].bind(this.b) : this.a.get("player", b);
    };n.ff = function (b) {
      this.a.aa() || this.g.dispatchEvent(b);
    };n.Gf = function (b, c) {
      this.a.aa() && ("video" == b ? this.f.dispatchEvent(c) : "player" == b && this.g.dispatchEvent(c));
    };function fe(b, c, d, e) {
      E.call(this);this.a = b;this.b = c;this.c = new Cb();this.u = { video: b, player: c };this.v = d || function () {};this.B = e || function (b) {
        return b;
      };this.s = !1;this.h = !0;this.g = 0;this.o = !1;this.j = !0;this.m = this.i = this.f = null;ge(this);
    }Fa(fe, E);y("shaka.cast.CastReceiver", fe);fe.prototype.isConnected = function () {
      return this.s;
    };fe.prototype.isConnected = fe.prototype.isConnected;fe.prototype.Ce = function () {
      return this.h;
    };fe.prototype.isIdle = fe.prototype.Ce;
    fe.prototype.destroy = function () {
      var b = [this.c ? this.c.destroy() : null, this.b ? this.b.destroy() : null];null != this.m && window.clearTimeout(this.m);this.v = this.u = this.c = this.b = this.a = null;this.s = !1;this.h = !0;this.m = this.i = this.f = null;return Promise.all(b).then(function () {
        cast.receiver.CastReceiverManager.getInstance().stop();
      });
    };fe.prototype.destroy = fe.prototype.destroy;
    function ge(b) {
      var c = cast.receiver.CastReceiverManager.getInstance();c.onSenderConnected = b.pd.bind(b);c.onSenderDisconnected = b.pd.bind(b);c.onSystemVolumeChanged = b.be.bind(b);b.i = c.getCastMessageBus("urn:x-cast:com.google.cast.media");b.i.onMessage = b.He.bind(b);b.f = c.getCastMessageBus("urn:x-cast:com.google.shaka.v2");b.f.onMessage = b.Ue.bind(b);c.start();Ld.forEach(function (b) {
        G(this.c, this.a, b, this.td.bind(this, "video"));
      }.bind(b));Pd.forEach(function (b) {
        G(this.c, this.b, b, this.td.bind(this, "player"));
      }.bind(b));
      cast.__platform__ && cast.__platform__.canDisplayType('video/mp4; codecs="avc1.640028"; width=3840; height=2160') ? b.b.Cc(3840, 2160) : b.b.Cc(1920, 1080);G(b.c, b.a, "loadeddata", function () {
        this.o = !0;
      }.bind(b));G(b.c, b.b, "loading", function () {
        this.h = !1;he(this);
      }.bind(b));G(b.c, b.a, "playing", function () {
        this.h = !1;he(this);
      }.bind(b));G(b.c, b.a, "pause", function () {
        he(this);
      }.bind(b));G(b.c, b.b, "unloading", function () {
        this.h = !0;he(this);
      }.bind(b));G(b.c, b.a, "ended", function () {
        window.setTimeout(function () {
          this.a && this.a.ended && (this.h = !0, he(this));
        }.bind(this), 5E3);
      }.bind(b));
    }n = fe.prototype;n.pd = function () {
      this.g = 0;this.j = !0;this.s = 0 != cast.receiver.CastReceiverManager.getInstance().getSenders().length;he(this);
    };function he(b) {
      Promise.resolve().then(function () {
        this.b && (this.dispatchEvent(new D("caststatuschanged")), ie(this) || je(this, 0));
      }.bind(b));
    }
    function ke(b, c, d) {
      for (var e in c.player) {
        b.b[e](c.player[e]);
      }b.v(d);d = Promise.resolve();var f = b.a.autoplay;c.manifest && (b.a.autoplay = !1, d = b.b.load(c.manifest, c.startTime));d.then(function () {
        if (b.b) {
          for (var d in c.video) {
            b.a[d] = c.video[d];
          }for (var e in c.playerAfterLoad) {
            b.b[e](c.playerAfterLoad[e]);
          }b.a.autoplay = f;c.manifest && (b.a.play(), je(b, 0));
        }
      }, function (c) {
        b.b.dispatchEvent(new D("error", { detail: c }));
      });
    }n.td = function (b, c) {
      this.b && (this.vc(), le(this, { type: "event", targetName: b, event: c }, this.f));
    };
    n.vc = function () {
      null != this.m && window.clearTimeout(this.m);this.m = window.setTimeout(this.vc.bind(this), 500);var b = { video: {}, player: {} };Md.forEach(function (c) {
        b.video[c] = this.a[c];
      }.bind(this));if (this.b.W()) for (var c in Rd) {
        0 == this.g % Rd[c] && (b.player[c] = this.b[c]());
      }for (var d in Qd) {
        0 == this.g % Qd[d] && (b.player[d] = this.b[d]());
      }if (c = cast.receiver.CastReceiverManager.getInstance().getSystemVolume()) b.video.volume = c.level, b.video.muted = c.muted;this.o && (this.g += 1);le(this, { type: "update", update: b }, this.f);ie(this);
    };
    function ie(b) {
      return b.j && (b.a.duration || b.b.W()) ? (me(b), b.j = !1, !0) : !1;
    }function me(b) {
      var c = { contentId: b.b.cc(), streamType: b.b.W() ? "LIVE" : "BUFFERED", duration: b.a.duration, contentType: "" };je(b, 0, c);
    }n.be = function () {
      var b = cast.receiver.CastReceiverManager.getInstance().getSystemVolume();b && le(this, { type: "update", update: { video: { volume: b.level, muted: b.muted } } }, this.f);le(this, { type: "event", targetName: "video", event: { type: "volumechange" } }, this.f);
    };
    n.Ue = function (b) {
      var c = Xd(b.data);switch (c.type) {case "init":
          this.g = 0;this.o = !1;this.j = !0;ke(this, c.initState, c.appData);this.vc();break;case "appData":
          this.v(c.appData);break;case "set":
          var d = c.targetName,
              e = c.property;c = c.value;if ("video" == d) {
            var f = cast.receiver.CastReceiverManager.getInstance();if ("volume" == e) {
              f.setSystemVolumeLevel(c);break;
            } else if ("muted" == e) {
              f.setSystemVolumeMuted(c);break;
            }
          }this.u[d][e] = c;break;case "call":
          d = this.u[c.targetName];d[c.methodName].apply(d, c.args);break;case "asyncCall":
          d = c.targetName;e = c.methodName;"player" == d && "load" == e && (this.g = 0, this.o = !1);f = c.id;b = b.senderId;var g = this.u[d];c = g[e].apply(g, c.args);"player" == d && "load" == e && (c = c.then(function () {
            this.j = !0;
          }.bind(this)));c.then(this.Ad.bind(this, b, f, null), this.Ad.bind(this, b, f));}
    };
    n.He = function (b) {
      var c = Xd(b.data);switch (c.type) {case "PLAY":
          this.a.play();je(this, 0);break;case "PAUSE":
          this.a.pause();je(this, 0);break;case "SEEK":
          b = c.currentTime;var d = c.resumeState;null != b && (this.a.currentTime = Number(b));d && "PLAYBACK_START" == d ? (this.a.play(), je(this, 0)) : d && "PLAYBACK_PAUSE" == d && (this.a.pause(), je(this, 0));break;case "STOP":
          this.b.vb().then(function () {
            this.b && je(this, 0);
          }.bind(this));break;case "GET_STATUS":
          je(this, Number(c.requestId));break;case "VOLUME":
          d = c.volume;b = d.level;d = d.muted;var e = this.a.volume,
              f = this.a.muted;null != b && (this.a.volume = Number(b));null != d && (this.a.muted = d);e == this.a.volume && f == this.a.muted || je(this, 0);break;case "LOAD":
          this.g = 0;this.j = this.o = !1;b = c.currentTime;d = this.B(c.media.contentId);this.a.autoplay = !0;this.b.load(d, b).then(function () {
            this.b && me(this);
          }.bind(this))["catch"](function (b) {
            var d = "LOAD_FAILED";7 == b.category && 7E3 == b.code && (d = "LOAD_CANCELLED");le(this, { requestId: Number(c.requestId), type: d }, this.i);
          }.bind(this));break;default:
          le(this, { requestId: Number(c.requestId),
            type: "INVALID_REQUEST", reason: "INVALID_COMMAND" }, this.i);}
    };n.Ad = function (b, c, d) {
      this.b && le(this, { type: "asyncComplete", id: c, error: d }, this.f, b);
    };function le(b, c, d, e) {
      b.s && (b = Wd(c), e ? d.getCastChannel(e).send(b) : d.broadcast(b));
    }
    function je(b, c, d) {
      var e = b.a.playbackRate;var f = ne;f = b.h ? f.IDLE : b.b.dd() ? f.Nd : b.a.paused ? f.Pd : f.Qd;e = { mediaSessionId: 0, playbackRate: e, playerState: f, currentTime: b.a.currentTime, supportedMediaCommands: 15, volume: { level: b.a.volume, muted: b.a.muted } };d && (e.media = d);le(b, { requestId: c, type: "MEDIA_STATUS", status: [e] }, b.i);
    }var ne = { IDLE: "IDLE", Qd: "PLAYING", Nd: "BUFFERING", Pd: "PAUSED" };var M = { Ib: function Ib(b, c) {
        var d = M.N(b, c);return 1 != d.length ? null : d[0];
      }, N: function N(b, c) {
        return Array.prototype.filter.call(b.childNodes, function (b) {
          return b instanceof Element && b.tagName == c;
        });
      }, ce: function ce(b, c, d) {
        return Array.prototype.filter.call(b.childNodes, function (b) {
          return b instanceof Element && b.localName == d && b.namespaceURI == c;
        });
      }, getAttributeNS: function getAttributeNS(b, c, d) {
        return b.hasAttributeNS(c, d) ? b.getAttributeNS(c, d) : null;
      }, Kb: function Kb(b) {
        return Array.prototype.every.call(b.childNodes, function (b) {
          return b.nodeType == Node.TEXT_NODE || b.nodeType == Node.CDATA_SECTION_NODE;
        }) ? b.textContent.trim() : null;
      }, G: function G(b, c, d, e) {
        e = void 0 === e ? null : e;var f = null;b = b.getAttribute(c);null != b && (f = d(b));return null == f ? e : f;
      }, bf: function bf(b) {
        if (!b) return null;/^\d+-\d+-\d+T\d+:\d+:\d+(\.\d+)?$/.test(b) && (b += "Z");b = Date.parse(b);return isNaN(b) ? null : Math.floor(b / 1E3);
      }, sa: function sa(b) {
        if (!b) return null;b = /^P(?:([0-9]*)Y)?(?:([0-9]*)M)?(?:([0-9]*)D)?(?:T(?:([0-9]*)H)?(?:([0-9]*)M)?(?:([0-9.]*)S)?)?$/.exec(b);if (!b) return null;b = 31536E3 * Number(b[1] || null) + 2592E3 * Number(b[2] || null) + 86400 * Number(b[3] || null) + 3600 * Number(b[4] || null) + 60 * Number(b[5] || null) + Number(b[6] || null);return isFinite(b) ? b : null;
      }, Rb: function Rb(b) {
        var c = /([0-9]+)-([0-9]+)/.exec(b);if (!c) return null;b = Number(c[1]);if (!isFinite(b)) return null;c = Number(c[2]);return isFinite(c) ? { start: b, end: c } : null;
      }, parseInt: function parseInt(b) {
        b = Number(b);return 0 === b % 1 ? b : null;
      }, Qb: function Qb(b) {
        b = Number(b);return 0 === b % 1 && 0 < b ? b : null;
      }, Ya: function Ya(b) {
        b = Number(b);return 0 === b % 1 && 0 <= b ? b : null;
      }, parseFloat: function parseFloat(b) {
        b = Number(b);return isNaN(b) ? null : b;
      }, ae: function ae(b) {
        var c;b = (c = b.match(/^(\d+)\/(\d+)$/)) ? Number(c[1] / c[2]) : Number(b);return isNaN(b) ? null : b;
      } };var oe = new Map().set("urn:uuid:1077efec-c0b2-4d02-ace3-3c1e52e2fb4b", "org.w3.clearkey").set("urn:uuid:edef8ba9-79d6-4ace-a3c8-27dcd51d21ed", "com.widevine.alpha").set("urn:uuid:9a04f079-9840-4286-ab92-e65be0885f95", "com.microsoft.playready").set("urn:uuid:f239e769-efa3-4850-9c16-a903c6932efb", "com.adobe.primetime");
    function pe(b, c, d) {
      var e = qe(b),
          f = null;b = [];var g = [],
          h = new Set(e.map(function (b) {
        return b.keyId;
      }));h["delete"](null);if (1 < h.size) throw new A(2, 4, 4010);d || (g = e.filter(function (b) {
        return "urn:mpeg:dash:mp4protection:2011" == b.zd ? (f = b.init || f, !1) : !0;
      }), g.length && (b = re(f, c, g), 0 == b.length && (b = [ed("", f)])));if (e.length && (d || !g.length)) for (b = [], c = q(oe.values()), d = c.next(); !d.done; d = c.next()) {
        d = d.value, "org.w3.clearkey" != d && b.push(ed(d, f));
      }if (h = Array.from(h)[0] || null) for (c = q(b), d = c.next(); !d.done; d = c.next()) {
        for (d = q(d.value.initData), e = d.next(); !e.done; e = d.next()) {
          e.value.keyId = h;
        }
      }return { Qc: h, Zf: f, drmInfos: b, Xc: !0 };
    }function se(b, c, d, e) {
      var f = pe(b, c, e);if (d.Xc) {
        b = 1 == d.drmInfos.length && !d.drmInfos[0].keySystem;c = 0 == f.drmInfos.length;if (0 == d.drmInfos.length || b && !c) d.drmInfos = f.drmInfos;d.Xc = !1;
      } else if (0 < f.drmInfos.length && (d.drmInfos = d.drmInfos.filter(function (b) {
        return f.drmInfos.some(function (c) {
          return c.keySystem == b.keySystem;
        });
      }), 0 == d.drmInfos.length)) throw new A(2, 4, 4008);return f.Qc || d.Qc;
    }
    function re(b, c, d) {
      var e = [];d = q(d);for (var f = d.next(); !f.done; f = d.next()) {
        f = f.value;var g = oe.get(f.zd);if (g) e.push(ed(g, f.init || b));else for (f = c(f.node) || [], f = q(f), g = f.next(); !g.done; g = f.next()) {
          e.push(g.value);
        }
      }return e;
    }function qe(b) {
      var c = [];b = q(b);for (var d = b.next(); !d.done; d = b.next()) {
        (d = te(d.value)) && c.push(d);
      }return c;
    }
    function te(b) {
      var c = b.getAttribute("schemeIdUri"),
          d = M.getAttributeNS(b, "urn:mpeg:cenc:2013", "default_KID"),
          e = M.ce(b, "urn:mpeg:cenc:2013", "pssh").map(M.Kb);if (!c) return null;c = c.toLowerCase();if (d && (d = d.replace(/-/g, "").toLowerCase(), d.includes(" "))) throw new A(2, 4, 4009);var f = [];try {
        f = e.map(function (b) {
          return { initDataType: "cenc", initData: Zb(b), keyId: null };
        });
      } catch (g) {
        throw new A(2, 4, 4007);
      }return { node: b, zd: c, keyId: d, init: 0 < f.length ? f : null };
    };function ue(b, c, d, e, f) {
      var g = { RepresentationID: c, Number: d, Bandwidth: e, Time: f };return b.replace(/\$(RepresentationID|Number|Bandwidth|Time)?(?:%0([0-9]+)([diouxX]))?\$/g, function (b, c, d, e) {
        if ("$$" == b) return "$";var f = g[c];if (null == f) return b;"RepresentationID" == c && d && (d = void 0);"Time" == c && (f = Math.round(f));switch (e) {case void 0:case "d":case "i":case "u":
            b = f.toString();break;case "o":
            b = f.toString(8);break;case "x":
            b = f.toString(16);break;case "X":
            b = f.toString(16).toUpperCase();break;default:
            b = f.toString();}d = window.parseInt(d, 10) || 1;return Array(Math.max(0, d - b.length) + 1).join("0") + b;
      });
    }
    function ve(b, c) {
      var d = we(b, c, "timescale"),
          e = 1;d && (e = M.Qb(d) || 1);d = we(b, c, "duration");(d = M.Qb(d || "")) && (d /= e);var f = we(b, c, "startNumber"),
          g = Number(we(b, c, "presentationTimeOffset")) || 0,
          h = M.Ya(f || "");if (null == f || null == h) h = 1;var k = xe(b, c, "SegmentTimeline");f = null;if (k) {
        f = e;var l = b.O.duration || Infinity;k = M.N(k, "S");for (var m = [], p = 0, t = 0; t < k.length; ++t) {
          var w = k[t],
              x = M.G(w, "t", M.Ya),
              B = M.G(w, "d", M.Ya);w = M.G(w, "r", M.parseInt);null != x && (x -= g);if (!B) break;x = null != x ? x : p;w = w || 0;if (0 > w) if (t + 1 < k.length) {
            w = M.G(k[t + 1], "t", M.Ya);if (null == w) break;else if (x >= w) break;w = Math.ceil((w - x) / B) - 1;
          } else {
            if (Infinity == l) break;else if (x / f >= l) break;w = Math.ceil((l * f - x) / B) - 1;
          }0 < m.length && x != p && (m[m.length - 1].end = x / f);for (var R = 0; R <= w; ++R) {
            p = x + B, m.push({ start: x / f, end: p / f, Pf: x }), x = p;
          }
        }f = m;
      }return { timescale: e, T: d, La: h, fa: g / e || 0, Hc: g, L: f };
    }function we(b, c, d) {
      return [c(b.w), c(b.Y), c(b.da)].filter(H.va).map(function (b) {
        return b.getAttribute(d);
      }).reduce(function (b, c) {
        return b || c;
      });
    }
    function xe(b, c, d) {
      return [c(b.w), c(b.Y), c(b.da)].filter(H.va).map(function (b) {
        return M.Ib(b, d);
      }).reduce(function (b, c) {
        return b || c;
      });
    }function ye(b, c) {
      var d = new DOMParser();try {
        var e = Ob(b);var f = d.parseFromString(e, "text/xml");
      } catch (h) {}if (f && f.documentElement.tagName == c) var g = f.documentElement;return g && 0 < g.getElementsByTagName("parsererror").length ? null : g;
    }
    function ze(b, c, d, e, f, g) {
      for (var h = M.getAttributeNS(b, "http://www.w3.org/1999/xlink", "href"), k = M.getAttributeNS(b, "http://www.w3.org/1999/xlink", "actuate") || "onRequest", l = 0; l < b.attributes.length; l++) {
        var m = b.attributes[l];"http://www.w3.org/1999/xlink" == m.namespaceURI && (b.removeAttributeNS(m.namespaceURI, m.localName), --l);
      }if (5 <= g) return fb(new A(2, 4, 4028));if ("onLoad" != k) return fb(new A(2, 4, 4027));var p = dd([e], [h]);return f.request(0, xb(p, c)).Z(function (e) {
        e = ye(e.data, b.tagName);if (!e) return fb(new A(2, 4, 4001, h));for (; b.childNodes.length;) {
          b.removeChild(b.childNodes[0]);
        }for (; e.childNodes.length;) {
          var k = e.childNodes[0];e.removeChild(k);b.appendChild(k);
        }for (k = 0; k < e.attributes.length; k++) {
          var l = e.attributes[k].nodeName,
              m = e.getAttribute(l);b.setAttribute(l, m);
        }return Ae(b, c, d, p[0], f, g + 1);
      });
    }
    function Ae(b, c, d, e, f, g) {
      g = void 0 === g ? 0 : g;if (M.getAttributeNS(b, "http://www.w3.org/1999/xlink", "href")) {
        var h = ze(b, c, d, e, f, g);d && (h = h.Z(void 0, function () {
          return Ae(b, c, d, e, f, g);
        }));return h;
      }h = [];for (var k = 0; k < b.childNodes.length; k++) {
        var l = b.childNodes[k];l instanceof Element && ("urn:mpeg:dash:resolve-to-zero:2013" == M.getAttributeNS(l, "http://www.w3.org/1999/xlink", "href") ? (b.removeChild(l), --k) : "SegmentTimeline" != l.tagName && h.push(Ae(l, c, d, e, f, g)));
      }return jb(h).Z(function () {
        return b;
      });
    };function Be(b, c, d) {
      this.c = b;this.b = c;this.a = d;
    }y("shaka.media.InitSegmentReference", Be);Be.prototype.$b = function () {
      return this.c();
    };Be.prototype.createUris = Be.prototype.$b;Be.prototype.fc = function () {
      return this.b;
    };Be.prototype.getStartByte = Be.prototype.fc;Be.prototype.ec = function () {
      return this.a;
    };Be.prototype.getEndByte = Be.prototype.ec;function N(b, c, d, e, f, g) {
      this.position = b;this.startTime = c;this.endTime = d;this.c = e;this.b = f;this.a = g;
    }y("shaka.media.SegmentReference", N);N.prototype.V = function () {
      return this.position;
    };
    N.prototype.getPosition = N.prototype.V;N.prototype.gc = function () {
      return this.startTime;
    };N.prototype.getStartTime = N.prototype.gc;N.prototype.ke = function () {
      return this.endTime;
    };N.prototype.getEndTime = N.prototype.ke;N.prototype.$b = function () {
      return this.c();
    };N.prototype.createUris = N.prototype.$b;N.prototype.fc = function () {
      return this.b;
    };N.prototype.getStartByte = N.prototype.fc;N.prototype.ec = function () {
      return this.a;
    };N.prototype.getEndByte = N.prototype.ec;function P(b, c) {
      this.H = b;this.b = c == Ce;this.a = 0;
    }y("shaka.util.DataViewReader", P);var Ce = 1;P.Endianness = { Wf: 0, Xf: Ce };P.prototype.ia = function () {
      return this.a < this.H.byteLength;
    };P.prototype.hasMoreData = P.prototype.ia;P.prototype.V = function () {
      return this.a;
    };P.prototype.getPosition = P.prototype.V;P.prototype.le = function () {
      return this.H.byteLength;
    };P.prototype.getLength = P.prototype.le;P.prototype.ea = function () {
      try {
        var b = this.H.getUint8(this.a);this.a += 1;return b;
      } catch (c) {
        De();
      }
    };P.prototype.readUint8 = P.prototype.ea;
    P.prototype.ob = function () {
      try {
        var b = this.H.getUint16(this.a, this.b);this.a += 2;return b;
      } catch (c) {
        De();
      }
    };P.prototype.readUint16 = P.prototype.ob;P.prototype.C = function () {
      try {
        var b = this.H.getUint32(this.a, this.b);this.a += 4;return b;
      } catch (c) {
        De();
      }
    };P.prototype.readUint32 = P.prototype.C;P.prototype.ud = function () {
      try {
        var b = this.H.getInt32(this.a, this.b);this.a += 4;return b;
      } catch (c) {
        De();
      }
    };P.prototype.readInt32 = P.prototype.ud;
    P.prototype.$a = function () {
      try {
        if (this.b) {
          var b = this.H.getUint32(this.a, !0);var c = this.H.getUint32(this.a + 4, !0);
        } else c = this.H.getUint32(this.a, !1), b = this.H.getUint32(this.a + 4, !1);
      } catch (d) {
        De();
      }if (2097151 < c) throw new A(2, 3, 3001);this.a += 8;return c * Math.pow(2, 32) + b;
    };P.prototype.readUint64 = P.prototype.$a;P.prototype.Ja = function (b) {
      this.a + b > this.H.byteLength && De();var c = new Uint8Array(this.H.buffer, this.H.byteOffset + this.a, b);this.a += b;return new Uint8Array(c);
    };P.prototype.readBytes = P.prototype.Ja;
    P.prototype.I = function (b) {
      this.a + b > this.H.byteLength && De();this.a += b;
    };P.prototype.skip = P.prototype.I;P.prototype.xd = function (b) {
      this.a < b && De();this.a -= b;
    };P.prototype.rewind = P.prototype.xd;P.prototype.seek = function (b) {
      (0 > b || b > this.H.byteLength) && De();this.a = b;
    };P.prototype.seek = P.prototype.seek;P.prototype.wc = function () {
      for (var b = this.a; this.ia() && 0 != this.H.getUint8(this.a);) {
        this.a += 1;
      }b = new Uint8Array(this.H.buffer, this.H.byteOffset + b, this.a - b);this.a += 1;return Ob(b);
    };
    P.prototype.readTerminatedString = P.prototype.wc;function De() {
      throw new A(2, 3, 3E3);
    };function S() {
      this.c = [];this.b = [];this.a = !1;
    }y("shaka.util.Mp4Parser", S);S.prototype.F = function (b, c) {
      var d = Ee(b);this.c[d] = 0;this.b[d] = c;return this;
    };S.prototype.box = S.prototype.F;S.prototype.$ = function (b, c) {
      var d = Ee(b);this.c[d] = 1;this.b[d] = c;return this;
    };S.prototype.fullBox = S.prototype.$;S.prototype.stop = function () {
      this.a = !0;
    };S.prototype.stop = S.prototype.stop;
    S.prototype.parse = function (b, c) {
      var d = new Uint8Array(b);d = new P(new DataView(d.buffer, d.byteOffset, d.byteLength), 0);for (this.a = !1; d.ia() && !this.a;) {
        this.Pb(0, d, c);
      }
    };S.prototype.parse = S.prototype.parse;
    S.prototype.Pb = function (b, c, d) {
      var e = c.V(),
          f = c.C(),
          g = c.C();switch (f) {case 0:
          f = c.H.byteLength - e;break;case 1:
          f = c.$a();}var h = this.b[g];if (h) {
        var k = null,
            l = null;1 == this.c[g] && (l = c.C(), k = l >>> 24, l &= 16777215);g = e + f;d && g > c.H.byteLength && (g = c.H.byteLength);g -= c.V();c = 0 < g ? c.Ja(g) : new Uint8Array(0);c = new P(new DataView(c.buffer, c.byteOffset, c.byteLength), 0);h({ parser: this, partialOkay: d || !1, version: k, flags: l, reader: c, size: f, start: e + b });
      } else c.I(Math.min(e + f - c.V(), c.H.byteLength - c.V()));
    };
    S.prototype.parseNext = S.prototype.Pb;function T(b) {
      for (; b.reader.ia() && !b.parser.a;) {
        b.parser.Pb(b.start, b.reader, b.partialOkay);
      }
    }S.children = T;function Fe(b) {
      for (var c = b.reader.C(); 0 < c && !b.parser.a; --c) {
        b.parser.Pb(b.start, b.reader, b.partialOkay);
      }
    }S.sampleDescription = Fe;function Ge(b) {
      return function (c) {
        b(c.reader.Ja(c.reader.H.byteLength - c.reader.V()));
      };
    }S.allData = Ge;function Ee(b) {
      for (var c = 0, d = 0; d < b.length; d++) {
        c = c << 8 | b.charCodeAt(d);
      }return c;
    }
    function He(b) {
      return String.fromCharCode(b >> 24 & 255, b >> 16 & 255, b >> 8 & 255, b & 255);
    }S.typeToString = He;function Ie(b, c, d, e) {
      var f,
          g = new S().$("sidx", function (b) {
        f = Je(c, e, d, b);
      });b && g.parse(b);if (f) return f;throw new A(2, 3, 3004);
    }
    function Je(b, c, d, e) {
      var f = [];e.reader.I(4);var g = e.reader.C();if (0 == g) throw new A(2, 3, 3005);if (0 == e.version) {
        var h = e.reader.C();var k = e.reader.C();
      } else h = e.reader.$a(), k = e.reader.$a();e.reader.I(2);var l = e.reader.ob();b = b + e.size + k;for (k = 0; k < l; k++) {
        var m = e.reader.C(),
            p = (m & 2147483648) >>> 31;m &= 2147483647;var t = e.reader.C();e.reader.I(4);if (1 == p) throw new A(2, 3, 3006);f.push(new N(f.length, h / g - c, (h + t) / g - c, function () {
          return d;
        }, b, b + m - 1));h += t;b += m;
      }e.parser.stop();return f;
    };function U(b) {
      this.a = b;
    }y("shaka.media.SegmentIndex", U);U.prototype.destroy = function () {
      this.a = null;return Promise.resolve();
    };U.prototype.destroy = U.prototype.destroy;U.prototype.find = function (b) {
      for (var c = this.a.length - 1; 0 <= c; --c) {
        var d = this.a[c];if (b >= d.startTime && b < d.endTime) return d.position;
      }return this.a.length && b < this.a[0].startTime ? this.a[0].position : null;
    };U.prototype.find = U.prototype.find;
    U.prototype.get = function (b) {
      if (0 == this.a.length) return null;b -= this.a[0].position;return 0 > b || b >= this.a.length ? null : this.a[b];
    };U.prototype.get = U.prototype.get;U.prototype.offset = function (b) {
      for (var c = 0; c < this.a.length; ++c) {
        this.a[c].startTime += b, this.a[c].endTime += b;
      }
    };U.prototype.offset = U.prototype.offset;
    U.prototype.oc = function (b) {
      for (var c = [], d = 0, e = 0; d < this.a.length && e < b.length;) {
        var f = this.a[d],
            g = b[e];f.startTime < g.startTime ? (c.push(f), d++) : (f.startTime > g.startTime ? 0 == d && c.push(g) : (.1 < Math.abs(f.endTime - g.endTime) ? c.push(new N(f.position, g.startTime, g.endTime, g.c, g.b, g.a)) : c.push(f), d++), e++);
      }for (; d < this.a.length;) {
        c.push(this.a[d++]);
      }if (c.length) for (d = c[c.length - 1].position + 1; e < b.length;) {
        f = b[e++], f = new N(d++, f.startTime, f.endTime, f.c, f.b, f.a), c.push(f);
      } else c = b;this.a = c;
    };U.prototype.merge = U.prototype.oc;
    U.prototype.ac = function (b) {
      for (var c = 0; c < this.a.length; ++c) {
        if (this.a[c].endTime > b) {
          this.a.splice(0, c);return;
        }
      }this.a = [];
    };U.prototype.evict = U.prototype.ac;function Ke(b, c) {
      for (; b.a.length;) {
        if (b.a[b.a.length - 1].startTime >= c) b.a.pop();else break;
      }for (; b.a.length;) {
        if (0 >= b.a[0].endTime) b.a.shift();else break;
      }if (0 != b.a.length) {
        var d = b.a[b.a.length - 1];b.a[b.a.length - 1] = new N(d.position, d.startTime, c, d.c, d.b, d.a);
      }
    };function Le(b) {
      this.b = b;this.a = new P(b, 0);Me || (Me = [new Uint8Array([255]), new Uint8Array([127, 255]), new Uint8Array([63, 255, 255]), new Uint8Array([31, 255, 255, 255]), new Uint8Array([15, 255, 255, 255, 255]), new Uint8Array([7, 255, 255, 255, 255, 255]), new Uint8Array([3, 255, 255, 255, 255, 255, 255]), new Uint8Array([1, 255, 255, 255, 255, 255, 255, 255])]);
    }var Me;Le.prototype.ia = function () {
      return this.a.ia();
    };
    function Ne(b) {
      var c = Oe(b);if (7 < c.length) throw new A(2, 3, 3002);for (var d = 0, e = 0; e < c.length; e++) {
        d = 256 * d + c[e];
      }c = d;d = Oe(b);a: {
        for (e = 0; e < Me.length; e++) {
          if (bc(d, Me[e])) {
            e = !0;break a;
          }
        }e = !1;
      }if (e) d = b.b.byteLength - b.a.V();else {
        if (8 == d.length && d[1] & 224) throw new A(2, 3, 3001);e = d[0] & (1 << 8 - d.length) - 1;for (var f = 1; f < d.length; f++) {
          e = 256 * e + d[f];
        }d = e;
      }d = b.a.V() + d <= b.b.byteLength ? d : b.b.byteLength - b.a.V();e = new DataView(b.b.buffer, b.b.byteOffset + b.a.V(), d);b.a.I(d);return new Pe(c, e);
    }
    function Oe(b) {
      var c = b.a.ea(),
          d;for (d = 1; 8 >= d && !(c & 1 << 8 - d); d++) {}if (8 < d) throw new A(2, 3, 3002);var e = new Uint8Array(d);e[0] = c;for (c = 1; c < d; c++) {
        e[c] = b.a.ea();
      }return e;
    }function Pe(b, c) {
      this.id = b;this.a = c;
    }function Qe(b) {
      if (8 < b.a.byteLength) throw new A(2, 3, 3002);if (8 == b.a.byteLength && b.a.getUint8(0) & 224) throw new A(2, 3, 3001);for (var c = 0, d = 0; d < b.a.byteLength; d++) {
        var e = b.a.getUint8(d);c = 256 * c + e;
      }return c;
    };function Re() {}
    Re.prototype.parse = function (b, c, d, e) {
      var f;c = new Le(new DataView(c));if (440786851 != Ne(c).id) throw new A(2, 3, 3008);var g = Ne(c);if (408125543 != g.id) throw new A(2, 3, 3009);c = g.a.byteOffset;g = new Le(g.a);for (f = null; g.ia();) {
        var h = Ne(g);if (357149030 == h.id) {
          f = h;break;
        }
      }if (!f) throw new A(2, 3, 3010);g = new Le(f.a);f = 1E6;for (h = null; g.ia();) {
        var k = Ne(g);if (2807729 == k.id) f = Qe(k);else if (17545 == k.id) if (h = k, 4 == h.a.byteLength) h = h.a.getFloat32(0);else if (8 == h.a.byteLength) h = h.a.getFloat64(0);else throw new A(2, 3, 3003);
      }if (null == h) throw new A(2, 3, 3011);g = f / 1E9;f = h * g;b = Ne(new Le(new DataView(b)));if (475249515 != b.id) throw new A(2, 3, 3007);return Se(b, c, g, f, d, e);
    };function Se(b, c, d, e, f, g) {
      function h() {
        return f;
      }var k = [];b = new Le(b.a);for (var l = null, m = null; b.ia();) {
        var p = Ne(b);if (187 == p.id) {
          var t = Te(p);t && (p = d * t.Qf, t = c + t.kf, null != l && k.push(new N(k.length, l - g, p - g, h, m, t - 1)), l = p, m = t);
        }
      }null != l && k.push(new N(k.length, l - g, e - g, h, m, null));return k;
    }
    function Te(b) {
      var c = new Le(b.a);b = Ne(c);if (179 != b.id) throw new A(2, 3, 3013);b = Qe(b);c = Ne(c);if (183 != c.id) throw new A(2, 3, 3012);c = new Le(c.a);for (var d = 0; c.ia();) {
        var e = Ne(c);if (241 == e.id) {
          d = Qe(e);break;
        }
      }return { Qf: b, kf: d };
    };function Ue(b, c) {
      var d = xe(b, c, "Initialization");if (!d) return null;var e = b.w.ga,
          f = d.getAttribute("sourceURL");f && (e = dd(b.w.ga, [f]));f = 0;var g = null;if (d = M.G(d, "range", M.Rb)) f = d.start, g = d.end;return new Be(function () {
        return e;
      }, f, g);
    }
    function Ve(b, c) {
      var d = Number(we(b, We, "presentationTimeOffset")) || 0,
          e = we(b, We, "timescale"),
          f = 1;e && (f = M.Qb(e) || 1);d = d / f || 0;e = Ue(b, We);var g = b.w.contentType;f = b.w.mimeType.split("/")[1];if ("text" != g && "mp4" != f && "webm" != f) throw new A(2, 4, 4006);if ("webm" == f && !e) throw new A(2, 4, 4005);g = xe(b, We, "RepresentationIndex");var h = we(b, We, "indexRange"),
          k = b.w.ga;h = M.Rb(h || "");if (g) {
        var l = g.getAttribute("sourceURL");l && (k = dd(b.w.ga, [l]));h = M.G(g, "range", M.Rb, h);
      }if (!h) throw new A(2, 4, 4002);f = Xe(b, c, e, k, h.start, h.end, f, d);return { createSegmentIndex: f.createSegmentIndex, findSegmentPosition: f.findSegmentPosition, getSegmentReference: f.getSegmentReference, initSegmentReference: e, fa: d };
    }
    function Xe(b, c, d, e, f, g, h, k) {
      var l = b.presentationTimeline,
          m = !b.Pa || !b.O.jc,
          p = b.O.start,
          t = b.O.duration,
          w = c,
          x = null;return { createSegmentIndex: function createSegmentIndex() {
          var b = [w(e, f, g), "webm" == h ? w(d.c(), d.b, d.a) : null];w = null;return Promise.all(b).then(function (b) {
            var c = b[0];b = b[1] || null;c = "mp4" == h ? Ie(c, f, e, k) : new Re().parse(c, b, e, k);l.Wa(c, p);x = new U(c);m && Ke(x, t);
          });
        }, findSegmentPosition: function findSegmentPosition(b) {
          return x.find(b);
        }, getSegmentReference: function getSegmentReference(b) {
          return x.get(b);
        } };
    }function We(b) {
      return b.qb;
    };function Ye(b, c) {
      var d = Ue(b, Ze);var e = $e(b);var f = ve(b, Ze),
          g = f.La;0 == g && (g = 1);var h = 0;f.T ? h = f.T * (g - 1) : f.L && 0 < f.L.length && (h = f.L[0].start);e = { T: f.T, startTime: h, La: g, fa: f.fa, L: f.L, Va: e };if (!e.T && !e.L && 1 < e.Va.length) throw new A(2, 4, 4002);if (!e.T && !b.O.duration && !e.L && 1 == e.Va.length) throw new A(2, 4, 4002);if (e.L && 0 == e.L.length) throw new A(2, 4, 4002);g = f = null;b.da.id && b.w.id && (g = b.da.id + "," + b.w.id, f = c[g]);h = af(b.O.duration, e.La, b.w.ga, e);f ? (f.oc(h), g = b.presentationTimeline.jb(), f.ac(g - b.O.start)) : (b.presentationTimeline.Wa(h, b.O.start), f = new U(h), g && b.Pa && (c[g] = f));b.Pa && b.O.jc || Ke(f, b.O.duration);return { createSegmentIndex: Promise.resolve.bind(Promise), findSegmentPosition: f.find.bind(f), getSegmentReference: f.get.bind(f), initSegmentReference: d, fa: e.fa };
    }function Ze(b) {
      return b.ya;
    }
    function af(b, c, d, e) {
      var f = e.Va.length;e.L && e.L.length != e.Va.length && (f = Math.min(e.L.length, e.Va.length));for (var g = [], h = e.startTime, k = 0; k < f; k++) {
        var l = e.Va[k],
            m = dd(d, [l.Ee]),
            p = void 0;p = null != e.T ? h + e.T : e.L ? e.L[k].end : h + b;g.push(new N(k + c, h, p, function (b) {
          return b;
        }.bind(null, m), l.start, l.end));h = p;
      }return g;
    }
    function $e(b) {
      return [b.w.ya, b.Y.ya, b.da.ya].filter(H.va).map(function (b) {
        return M.N(b, "SegmentURL");
      }).reduce(function (b, d) {
        return 0 < b.length ? b : d;
      }).map(function (c) {
        c.getAttribute("indexRange") && !b.cd && (b.cd = !0);var d = c.getAttribute("media");c = M.G(c, "mediaRange", M.Rb, { start: 0, end: null });return { Ee: d, start: c.start, end: c.end };
      });
    };function bf(b, c, d, e) {
      var f = cf(b);var g = ve(b, df);var h = we(b, df, "media"),
          k = we(b, df, "index");g = { T: g.T, timescale: g.timescale, La: g.La, fa: g.fa, Hc: g.Hc, L: g.L, mc: h, lb: k };h = g.lb ? 1 : 0;h += g.L ? 1 : 0;h += g.T ? 1 : 0;if (0 == h) throw new A(2, 4, 4002);1 != h && (g.lb && (g.L = null), g.T = null);if (!g.lb && !g.mc) throw new A(2, 4, 4002);if (g.lb) {
        d = b.w.mimeType.split("/")[1];if ("mp4" != d && "webm" != d) throw new A(2, 4, 4006);if ("webm" == d && !f) throw new A(2, 4, 4005);e = ue(g.lb, b.w.id, null, b.bandwidth || null, null);e = dd(b.w.ga, [e]);b = Xe(b, c, f, e, 0, null, d, g.fa);
      } else g.T ? (e || (b.presentationTimeline.qc(g.T), b.presentationTimeline.rc(b.O.start)), b = ef(b, g)) : (h = c = null, b.da.id && b.w.id && (h = b.da.id + "," + b.w.id, c = d[h]), k = ff(b, g), e = !b.Pa || !b.O.jc, c ? (e && Ke(new U(k), b.O.duration), c.oc(k), d = b.presentationTimeline.jb(), c.ac(d - b.O.start)) : (b.presentationTimeline.Wa(k, b.O.start), c = new U(k), h && b.Pa && (d[h] = c)), e && Ke(c, b.O.duration), b = { createSegmentIndex: Promise.resolve.bind(Promise), findSegmentPosition: c.find.bind(c), getSegmentReference: c.get.bind(c) });return { createSegmentIndex: b.createSegmentIndex,
        findSegmentPosition: b.findSegmentPosition, getSegmentReference: b.getSegmentReference, initSegmentReference: f, fa: g.fa };
    }function df(b) {
      return b.sb;
    }
    function ef(b, c) {
      var d = b.O.duration,
          e = c.T,
          f = c.La,
          g = c.timescale,
          h = c.mc,
          k = b.bandwidth || null,
          l = b.w.id,
          m = b.w.ga;return { createSegmentIndex: Promise.resolve.bind(Promise), findSegmentPosition: function findSegmentPosition(b) {
          return 0 > b || d && b >= d ? null : Math.floor(b / e);
        }, getSegmentReference: function getSegmentReference(b) {
          var c = b * e,
              p = c + e;d && (p = Math.min(p, d));return 0 > p || d && c >= d ? null : new N(b, c, p, function () {
            var d = ue(h, l, b + f, k, c * g);return dd(m, [d]);
          }, 0, null);
        } };
    }
    function ff(b, c) {
      for (var d = [], e = 0; e < c.L.length; e++) {
        var f = e + c.La;d.push(new N(f, c.L[e].start, c.L[e].end, function (b, c, d, e, f, p) {
          b = ue(b, c, f, d, p);return dd(e, [b]).map(function (b) {
            return b.toString();
          });
        }.bind(null, c.mc, b.w.id, b.bandwidth || null, b.w.ga, f, c.L[e].Pf + c.Hc), 0, null));
      }return d;
    }function cf(b) {
      var c = we(b, df, "initialization");if (!c) return null;var d = b.w.id,
          e = b.bandwidth || null,
          f = b.w.ga;return new Be(function () {
        var b = ue(c, d, null, e, null);return dd(f, [b]);
      }, 0, null);
    };var gf = {},
        hf = {};y("shaka.media.ManifestParser.registerParserByExtension", function (b, c) {
      hf[b] = c;
    });y("shaka.media.ManifestParser.registerParserByMime", function (b, c) {
      gf[b] = c;
    });function jf() {
      var b = {},
          c;for (c in gf) {
        b[c] = !0;
      }for (var d in hf) {
        b[d] = !0;
      }["application/dash+xml", "application/x-mpegurl", "application/vnd.apple.mpegurl", "application/vnd.ms-sstr+xml"].forEach(function (c) {
        b[c] = !!gf[c];
      });["mpd", "m3u8", "ism"].forEach(function (c) {
        b[c] = !!hf[c];
      });return b;
    }
    function kf(b, c, d, e) {
      return r(function g() {
        var h;return v(g, function (g) {
          switch (g.l) {case 1:
              return na(g, 2), u(g, lf(b, c, d, e), 4);case 4:
              return g["return"](g.A);case 2:
              throw h = ra(g), h.severity = 2, h;}
        });
      });
    }
    function lf(b, c, d, e) {
      return r(function g() {
        var h, k, l, m, p, t, w, x, B, R;return v(g, function (g) {
          switch (g.l) {case 1:
              if (e && (h = e.toLowerCase(), k = gf[h])) return g["return"](k);l = new Na(b);m = l.ca.split("/");p = m.pop();t = p.split(".");return 1 < t.length && (w = t.pop().toLowerCase(), x = hf[w]) ? g["return"](x) : u(g, mf(b, c, d), 2);case 2:
              B = g.A;if (R = gf[B]) return g["return"](R);throw new A(2, 4, 4E3, b);}
        });
      });
    }
    function mf(b, c, d) {
      return r(function f() {
        var g, h, k;return v(f, function (f) {
          switch (f.l) {case 1:
              return g = xb([b], d), g.method = "HEAD", u(f, c.request(0, g).promise, 2);case 2:
              return h = f.A, k = h.headers["content-type"], f["return"](k ? k.toLowerCase() : "");}
        });
      });
    };function W(b, c) {
      this.f = b;this.Sb = c;this.h = this.g = Infinity;this.a = 1;this.b = this.c = null;this.j = 0;this.m = !0;this.i = 0;
    }y("shaka.media.PresentationTimeline", W);W.prototype.S = function () {
      return this.g;
    };W.prototype.getDuration = W.prototype.S;W.prototype.la = function (b) {
      this.g = b;
    };W.prototype.setDuration = W.prototype.la;W.prototype.re = function () {
      return this.f;
    };W.prototype.getPresentationStartTime = W.prototype.re;W.prototype.Bd = function (b) {
      this.j = b;
    };W.prototype.setClockOffset = W.prototype.Bd;
    W.prototype.tb = function (b) {
      this.m = b;
    };W.prototype.setStatic = W.prototype.tb;W.prototype.Dc = function (b) {
      this.h = b;
    };W.prototype.setSegmentAvailabilityDuration = W.prototype.Dc;W.prototype.zf = function (b) {
      this.Sb = b;
    };W.prototype.setDelay = W.prototype.zf;W.prototype.je = function () {
      return this.Sb;
    };W.prototype.getDelay = W.prototype.je;
    W.prototype.Wa = function (b, c) {
      if (0 != b.length) {
        var d = b[b.length - 1].endTime + c;this.rc(b[0].startTime + c);this.a = b.reduce(function (b, c) {
          return Math.max(b, c.endTime - c.startTime);
        }, this.a);this.b = Math.max(this.b, d);null != this.f && (this.f = (Date.now() + this.j) / 1E3 - this.b - this.a);
      }
    };W.prototype.notifySegments = W.prototype.Wa;W.prototype.rc = function (b) {
      this.c = null == this.c ? b : Math.min(this.c, b);
    };W.prototype.notifyMinSegmentStartTime = W.prototype.rc;W.prototype.qc = function (b) {
      this.a = Math.max(this.a, b);
    };
    W.prototype.notifyMaxSegmentDuration = W.prototype.qc;W.prototype.offset = function (b) {
      null != this.c && (this.c += b);null != this.b && (this.b += b);
    };W.prototype.offset = W.prototype.offset;W.prototype.W = function () {
      return Infinity == this.g && !this.m;
    };W.prototype.isLive = W.prototype.W;W.prototype.Fa = function () {
      return Infinity != this.g && !this.m;
    };W.prototype.isInProgress = W.prototype.Fa;W.prototype.jb = function () {
      if (Infinity == this.h) return this.i;var b = this.Ra() - this.h;return Math.max(this.i, b);
    };
    W.prototype.getSegmentAvailabilityStart = W.prototype.jb;W.prototype.Dd = function (b) {
      this.i = b;
    };W.prototype.setUserSeekStart = W.prototype.Dd;W.prototype.Ra = function () {
      return this.W() || this.Fa() ? Math.min(Math.max(0, (Date.now() + this.j) / 1E3 - this.a - this.f), this.g) : this.g;
    };W.prototype.getSegmentAvailabilityEnd = W.prototype.Ra;W.prototype.ib = function (b) {
      var c = Math.max(this.c, this.i);if (Infinity == this.h) return c;var d = this.Ra() - this.h;b = Math.min(d + b, this.qa());return Math.max(c, b);
    };
    W.prototype.getSafeSeekRangeStart = W.prototype.ib;W.prototype.Qa = function () {
      return this.ib(0);
    };W.prototype.getSeekRangeStart = W.prototype.Qa;W.prototype.qa = function () {
      var b = this.W() || this.Fa() ? this.Sb : 0;return Math.max(0, this.Ra() - b);
    };W.prototype.getSeekRangeEnd = W.prototype.qa;W.prototype.Jd = function () {
      return null == this.f || null != this.b ? !1 : !0;
    };W.prototype.usingPresentationStartTime = W.prototype.Jd;function nf() {
      this.a = this.b = null;this.h = [];this.c = null;this.j = [];this.i = 1;this.m = {};this.o = 0;this.s = new Ga(5);this.g = null;this.f = new tb();
    }y("shaka.dash.DashParser", nf);n = nf.prototype;n.configure = function (b) {
      this.b = b;
    };n.start = function (b, c) {
      this.h = [b];this.a = c;return of(this).then(function (b) {
        this.a && pf(this, b);return this.c;
      }.bind(this));
    };n.stop = function () {
      this.b = this.a = null;this.h = [];this.c = null;this.j = [];this.m = {};null != this.g && (window.clearTimeout(this.g), this.g = null);return this.f.destroy();
    };
    n.update = function () {
      of(this)["catch"](function (b) {
        if (this.a) this.a.onError(b);
      }.bind(this));
    };n.onExpirationUpdated = function () {};function of(b) {
      var c = Date.now(),
          d = b.a.networkingEngine.request(0, xb(b.h, b.b.retryParameters));ub(b.f, d);return d.promise.then(function (c) {
        if (b.a) return qf(b, c.data, c.uri);
      }).then(function () {
        var d = (Date.now() - c) / 1E3;Ha(b.s, 1, d);return d;
      });
    }
    function qf(b, c, d) {
      c = ye(c, "MPD");if (!c) throw new A(2, 4, 4001, d);c = Ae(c, b.b.retryParameters, b.b.dash.xlinkFailGracefully, d, b.a.networkingEngine);ub(b.f, c);return c.promise.then(function (c) {
        return rf(b, c, d);
      });
    }
    function rf(b, c, d) {
      return r(function f() {
        var g, h, k, l, m, p, t, w, x, B, R, Q, O, V, oa, va, Y, Rb, Sb, Hc, Tb, qb, gg, hg, ig;return v(f, function (f) {
          switch (f.l) {case 1:
              l = H;m = M;p = [d];t = m.N(c, "Location").map(m.Kb).filter(l.va);0 < t.length && (p = b.h = t);w = m.N(c, "BaseURL").map(m.Kb);x = dd(p, w);(B = b.b.dash.ignoreMinBufferTime) || (R = m.G(c, "minBufferTime", m.sa));b.o = m.G(c, "minimumUpdatePeriod", m.sa, -1);Q = m.G(c, "availabilityStartTime", m.bf);O = m.G(c, "timeShiftBufferDepth", m.sa);V = m.G(c, "suggestedPresentationDelay", m.sa);oa = m.G(c, "maxSegmentDuration", m.sa);va = c.getAttribute("type") || "static";b.c ? Y = b.c.presentationTimeline : (Rb = Math.max(b.b.dash.defaultPresentationDelay, 1.5 * R), Sb = null != V ? V : Rb, Y = new W(Q, Sb));Hc = { Pa: "static" != va, presentationTimeline: Y, da: null, O: null, Y: null, w: null, bandwidth: 0, cd: !1 };for (var jg = Hc, Cj = x, Ic = M.G(c, "mediaPresentationDuration", M.sa), Jc = [], Sa = 0, Ub = M.N(c, "Period"), rb = 0; rb < Ub.length; rb++) {
                var cb = Ub[rb];Sa = M.G(cb, "start", M.sa, Sa);var Kc = M.G(cb, "duration", M.sa),
                    Ta = null;if (rb != Ub.length - 1) {
                  var kg = M.G(Ub[rb + 1], "start", M.sa);null != kg && (Ta = kg - Sa);
                } else null != Ic && (Ta = Ic - Sa);null == Ta && (Ta = Kc);cb = sf(b, jg, Cj, { start: Sa, duration: Ta, node: cb, jc: null == Ta || rb == Ub.length - 1 });Jc.push(cb);Kc = jg.da.id;b.j.includes(Kc) || (b.j.push(Kc), b.c && (b.a.filterNewPeriod(cb), b.c.periods.push(cb)));if (null == Ta) {
                  Sa = null;break;
                }Sa += Ta;
              }null == b.c && b.a.filterAllPeriods(Jc);null != Ic ? (g = Jc, h = Ic, k = !1) : (g = Jc, h = Sa, k = !0);Tb = h;qb = g;Y.tb("static" == va);"static" != va && k || Y.la(Tb || Infinity);(gg = Y.W()) && !isNaN(b.b.availabilityWindowOverride) && (O = b.b.availabilityWindowOverride);
              null == O && (O = Infinity);Y.Dc(O);Y.qc(oa || 1);if (b.c) {
                f.D(0);break;
              }b.c = { presentationTimeline: Y, periods: qb, offlineSessionIds: [], minBufferTime: R || 0 };if (!Y.Jd()) {
                f.D(0);break;
              }hg = m.N(c, "UTCTiming");return u(f, tf(b, x, hg, gg), 4);case 4:
              ig = f.A;if (!b.a) return f["return"]();Y.Bd(ig);f.l = 0;}
        });
      });
    }
    function sf(b, c, d, e) {
      c.da = uf(e.node, null, d);c.O = e;c.da.id || (c.da.id = "__shaka_period_" + e.start);M.N(e.node, "EventStream").forEach(b.df.bind(b, e.start, e.duration));d = M.N(e.node, "AdaptationSet").map(b.af.bind(b, c)).filter(H.va);if (c.Pa) {
        c = [];for (var f = q(d), g = f.next(); !g.done; g = f.next()) {
          g = q(g.value.nf);for (var h = g.next(); !h.done; h = g.next()) {
            c.push(h.value);
          }
        }if (c.length != new Set(c).size) throw new A(2, 4, 4018);
      }var k = d.filter(function (b) {
        return !b.Gc;
      });d.filter(function (b) {
        return b.Gc;
      }).forEach(function (b) {
        var c = b.streams[0],
            d = b.Gc;k.forEach(function (b) {
          b.id == d && b.streams.forEach(function (b) {
            b.trickModeVideo = c;
          });
        });
      });c = vf(k, "video");f = vf(k, "audio");if (!c.length && !f.length) throw new A(2, 4, 4004);f.length || (f = [null]);c.length || (c = [null]);d = [];for (g = 0; g < f.length; g++) {
        for (h = 0; h < c.length; h++) {
          wf(b, f[g], c[h], d);
        }
      }b = vf(k, "text");c = [];for (f = 0; f < b.length; f++) {
        c.push.apply(c, b[f].streams);
      }return { startTime: e.start, textStreams: c, variants: d };
    }function vf(b, c) {
      return b.filter(function (b) {
        return b.contentType == c;
      });
    }
    function wf(b, c, d, e) {
      if (c || d) if (c && d) {
        var f = c.drmInfos;var g = d.drmInfos;if (f.length && g.length ? 0 < Fc(f, g).length : 1) {
          g = Fc(c.drmInfos, d.drmInfos);for (var h = 0; h < c.streams.length; h++) {
            for (var k = 0; k < d.streams.length; k++) {
              f = (d.streams[k].bandwidth || 0) + (c.streams[h].bandwidth || 0), f = { id: b.i++, language: c.language, primary: c.lc || d.lc, audio: c.streams[h], video: d.streams[k], bandwidth: f, drmInfos: g, allowedByApplication: !0, allowedByKeySystem: !0 }, e.push(f);
            }
          }
        }
      } else for (g = c || d, h = 0; h < g.streams.length; h++) {
        f = g.streams[h].bandwidth || 0, f = { id: b.i++, language: g.language || "und", primary: g.lc, audio: c ? g.streams[h] : null, video: d ? g.streams[h] : null, bandwidth: f, drmInfos: g.drmInfos, allowedByApplication: !0, allowedByKeySystem: !0 }, e.push(f);
      }
    }
    n.af = function (b, c) {
      b.Y = uf(c, b.da, null);var d = !1,
          e = M.N(c, "Role"),
          f = e.map(function (b) {
        return b.getAttribute("value");
      }).filter(H.va),
          g = void 0,
          h = "text" == b.Y.contentType;h && (g = "subtitle");for (var k = 0; k < e.length; k++) {
        var l = e[k].getAttribute("schemeIdUri");if (null == l || "urn:mpeg:dash:role:2011" == l) switch (l = e[k].getAttribute("value"), l) {case "main":
            d = !0;break;case "caption":case "subtitle":
            g = l;}
      }var m = null,
          p = !1;M.N(c, "EssentialProperty").forEach(function (b) {
        "http://dashif.org/guidelines/trickmode" == b.getAttribute("schemeIdUri") ? m = b.getAttribute("value") : p = !0;
      });k = M.N(c, "Accessibility");var t = new Map();e = {};k = q(k);for (l = k.next(); !l.done; e = { fb: e.fb }, l = k.next()) {
        l = l.value;var w = l.getAttribute("schemeIdUri");if ("urn:scte:dash:cc:cea-608:2015" == w || "urn:scte:dash:cc:cea-708:2015" == w) e.fb = 1, l = l.getAttribute("value"), null != l ? l.split(";").forEach(function (b) {
          return function (c) {
            if (c.includes("=")) {
              c = c.split("=");var d = c[0].startsWith("CC") ? c[0] : "CC" + c[0];c = c[1].split(",")[0].split(":").pop();
            } else d = "CC" + b.fb, b.fb += 2;t.set(d, I(c));
          };
        }(e)) : t.set("CC1", "und");
      }if (p) return null;e = M.N(c, "ContentProtection");var x = pe(e, this.b.dash.customScheme, this.b.dash.ignoreDrmInfo);e = I(c.getAttribute("lang") || "und");l = c.getAttribute("label");k = M.N(c, "Representation");f = k.map(this.ef.bind(this, b, x, g, e, l, d, f, t)).filter(function (b) {
        return !!b;
      });if (0 == f.length) {
        if (h) return null;throw new A(2, 4, 4003);
      }b.Y.contentType && "application" != b.Y.contentType || (b.Y.contentType = xf(f[0].mimeType, f[0].codecs), f.forEach(function (c) {
        c.type = b.Y.contentType;
      }));f.forEach(function (b) {
        x.drmInfos.forEach(function (c) {
          b.keyId && c.keyIds.push(b.keyId);
        });
      });h = k.map(function (b) {
        return b.getAttribute("id");
      }).filter(H.va);return { id: b.Y.id || "__fake__" + this.i++, contentType: b.Y.contentType, language: e, lc: d, streams: f, drmInfos: x.drmInfos, Gc: m, nf: h };
    };
    n.ef = function (b, c, d, e, f, g, h, k, l) {
      b.w = uf(l, b.Y, null);if (!yf(b.w)) return null;b.bandwidth = M.G(l, "bandwidth", M.Qb) || 0;var m = b.w.contentType;m = "text" == m || "application" == m;try {
        var p = this.pf.bind(this);if (b.w.qb) var t = Ve(b, p);else if (b.w.ya) t = Ye(b, this.m);else if (b.w.sb) t = bf(b, p, this.m, !!this.c);else {
          var w = b.w.ga,
              x = b.O.duration || 0;t = { createSegmentIndex: Promise.resolve.bind(Promise), findSegmentPosition: function findSegmentPosition(b) {
              return 0 <= b && b < x ? 1 : null;
            }, getSegmentReference: function getSegmentReference(b) {
              return 1 != b ? null : new N(1, 0, x, function () {
                return w;
              }, 0, null);
            }, initSegmentReference: null, fa: 0 };
        }
      } catch (B) {
        if (m && 4002 == B.code) return null;throw B;
      }l = M.N(l, "ContentProtection");l = se(l, this.b.dash.customScheme, c, this.b.dash.ignoreDrmInfo);return { id: this.i++, originalId: b.w.id, createSegmentIndex: t.createSegmentIndex, findSegmentPosition: t.findSegmentPosition, getSegmentReference: t.getSegmentReference, initSegmentReference: t.initSegmentReference, presentationTimeOffset: t.fa, mimeType: b.w.mimeType, codecs: b.w.codecs, frameRate: b.w.frameRate, bandwidth: b.bandwidth, width: b.w.width,
        height: b.w.height, kind: d, encrypted: 0 < c.drmInfos.length, keyId: l, language: e, label: f, type: b.Y.contentType, primary: g, trickModeVideo: null, emsgSchemeIdUris: b.w.emsgSchemeIdUris, roles: h, channelsCount: b.w.sc, closedCaptions: k };
    };n.If = function () {
      this.g = null;of(this).then(function (b) {
        this.a && pf(this, b);
      }.bind(this))["catch"](function (b) {
        this.a && (b.severity = 1, this.a.onError(b), pf(this, 0));
      }.bind(this));
    };function pf(b, c) {
      0 > b.o || (b.g = window.setTimeout(b.If.bind(b), 1E3 * Math.max(3, b.o - c, Ia(b.s))));
    }
    function uf(b, c, d) {
      c = c || { contentType: "", mimeType: "", codecs: "", emsgSchemeIdUris: [], frameRate: void 0, sc: null };d = d || c.ga;var e = M.Ya,
          f = M.ae,
          g = M.N(b, "BaseURL").map(M.Kb),
          h = b.getAttribute("contentType") || c.contentType,
          k = b.getAttribute("mimeType") || c.mimeType,
          l = b.getAttribute("codecs") || c.codecs;f = M.G(b, "frameRate", f) || c.frameRate;var m = M.N(b, "InbandEventStream"),
          p = c.emsgSchemeIdUris.slice();m = q(m);for (var t = m.next(); !t.done; t = m.next()) {
        t = t.value.getAttribute("schemeIdUri"), p.includes(t) || p.push(t);
      }m = M.N(b, "AudioChannelConfiguration");m = zf(m) || c.sc;h || (h = xf(k, l));return { ga: dd(d, g), qb: M.Ib(b, "SegmentBase") || c.qb, ya: M.Ib(b, "SegmentList") || c.ya, sb: M.Ib(b, "SegmentTemplate") || c.sb, width: M.G(b, "width", e) || c.width, height: M.G(b, "height", e) || c.height, contentType: h, mimeType: k, codecs: l, frameRate: f, emsgSchemeIdUris: p, id: b.getAttribute("id"), sc: m };
    }
    function zf(b) {
      for (var c = 0; c < b.length; ++c) {
        var d = b[c],
            e = d.getAttribute("schemeIdUri");if (e && (d = d.getAttribute("value"))) switch (e) {case "urn:mpeg:dash:outputChannelPositionList:2012":
            return d.trim().split(/ +/).length;case "urn:mpeg:dash:23003:3:audio_channel_configuration:2011":case "urn:dts:dash:audio_channel_configuration:2012":
            e = parseInt(d, 10);if (!e) continue;return e;case "tag:dolby.com,2014:dash:audio_channel_configuration:2011":case "urn:dolby:dash:audio_channel_configuration:2011":
            if (e = parseInt(d, 16)) {
              for (b = 0; e;) {
                e & 1 && ++b, e >>= 1;
              }return b;
            }}
      }return null;
    }function yf(b) {
      var c = b.qb ? 1 : 0;c += b.ya ? 1 : 0;c += b.sb ? 1 : 0;if (0 == c) return "text" == b.contentType || "application" == b.contentType ? !0 : !1;1 != c && (b.qb && (b.ya = null), b.sb = null);return !0;
    }
    function Af(b, c, d, e) {
      c = dd(c, [d]);c = xb(c, b.b.retryParameters);c.method = e;c = b.a.networkingEngine.request(4, c);ub(b.f, c);return c.promise.then(function (b) {
        if ("HEAD" == e) {
          if (!b.headers || !b.headers.date) return 0;b = b.headers.date;
        } else b = Ob(b.data);b = Date.parse(b);return isNaN(b) ? 0 : b - Date.now();
      });
    }
    function tf(b, c, d, e) {
      d = d.map(function (b) {
        return { scheme: b.getAttribute("schemeIdUri"), value: b.getAttribute("value") };
      });var f = b.b.dash.clockSyncUri;e && !d.length && f && d.push({ scheme: "urn:mpeg:dash:utc:http-head:2014", value: f });return H.$d(d, function (b) {
        var d = b.value;switch (b.scheme) {case "urn:mpeg:dash:utc:http-head:2014":case "urn:mpeg:dash:utc:http-head:2012":
            return Af(this, c, d, "HEAD");case "urn:mpeg:dash:utc:http-xsdate:2014":case "urn:mpeg:dash:utc:http-iso:2014":case "urn:mpeg:dash:utc:http-xsdate:2012":case "urn:mpeg:dash:utc:http-iso:2012":
            return Af(this, c, d, "GET");case "urn:mpeg:dash:utc:direct:2014":case "urn:mpeg:dash:utc:direct:2012":
            return b = Date.parse(d), isNaN(b) ? 0 : b - Date.now();case "urn:mpeg:dash:utc:http-ntp:2014":case "urn:mpeg:dash:utc:ntp:2014":case "urn:mpeg:dash:utc:sntp:2014":
            return Promise.reject();default:
            return Promise.reject();}
      }.bind(b))["catch"](function () {
        return 0;
      });
    }
    n.df = function (b, c, d) {
      var e = M.Ya,
          f = d.getAttribute("schemeIdUri") || "",
          g = d.getAttribute("value") || "",
          h = M.G(d, "timescale", e) || 1;M.N(d, "Event").forEach(function (d) {
        var k = M.G(d, "presentationTime", e) || 0,
            m = M.G(d, "duration", e) || 0;k = k / h + b;m = k + m / h;null != c && (k = Math.min(k, b + c), m = Math.min(m, b + c));d = { schemeIdUri: f, value: g, startTime: k, endTime: m, id: d.getAttribute("id") || "", eventElement: d };this.a.onTimelineRegionAdded(d);
      }.bind(this));
    };
    n.pf = function (b, c, d) {
      b = xb(b, this.b.retryParameters);null != c && (b.headers.Range = "bytes=" + c + "-" + (null != d ? d : ""));c = this.a.networkingEngine.request(1, b);ub(this.f, c);return c.promise.then(function (b) {
        return b.data;
      });
    };function xf(b, c) {
      return nd(Kb(b, c)) ? "text" : b.split("/")[0];
    }hf.mpd = nf;gf["application/dash+xml"] = nf;function Bf(b, c, d, e) {
      this.b = b;this.type = c;this.a = d;this.segments = e || null;
    }function Cf(b, c, d, e) {
      this.id = b;this.name = c;this.a = d;this.value = void 0 === e ? null : e;
    }Cf.prototype.toString = function () {
      function b(b) {
        return b.name + '="' + b.value + '"';
      }return this.value ? "#" + this.name + ":" + this.value : 0 < this.a.length ? "#" + this.name + ":" + this.a.map(b).join(",") : "#" + this.name;
    };function Df(b, c) {
      this.name = b;this.value = c;
    }
    Cf.prototype.getAttribute = function (b) {
      var c = this.a.filter(function (c) {
        return c.name == b;
      });return c.length ? c[0] : null;
    };function Ef(b, c, d) {
      return (b = b.getAttribute(c)) ? b.value : d || null;
    }function Ff(b, c) {
      this.b = c;this.a = b;
    };function Gf(b, c) {
      return b.filter(function (b) {
        return b.name == c;
      });
    }function Hf(b, c) {
      var d = Gf(b, c);return d.length ? d[0] : null;
    }function If(b, c, d) {
      return b.filter(function (b) {
        var e = b.getAttribute("TYPE");b = b.getAttribute("GROUP-ID");return e.value == c && b.value == d;
      });
    };function Jf(b) {
      this.b = b;this.a = 0;
    }function Kf(b) {
      Lf(b, /[ \t]+/gm);
    }function Lf(b, c) {
      c.lastIndex = b.a;var d = c.exec(b.b);d = null == d ? null : { position: d.index, length: d[0].length, rf: d };if (b.a == b.b.length || null == d || d.position != b.a) return null;b.a += d.length;return d.rf;
    }function Mf(b) {
      return b.a == b.b.length ? null : (b = Lf(b, /[^ \t\n]*/gm)) ? b[0] : null;
    };function Nf() {
      this.a = 0;
    }
    function Of(b, c, d) {
      c = Ob(c);c = c.replace(/\r\n|\r(?=[^\n]|$)/gm, "\n").trim();var e = c.split(/\n+/m);if (!/^#EXTM3U($|[ \t\n])/m.test(e[0])) throw new A(2, 4, 4015);c = 0;for (var f = 1; f < e.length; f++) {
        if (!/^#(?!EXT)/m.test(e[f])) {
          var g = Pf(b, e[f]);--b.a;if (Qf.includes(g.name)) {
            c = 1;break;
          } else "EXT-X-STREAM-INF" == g.name && (f += 1);
        }
      }f = [];for (g = 1; g < e.length;) {
        if (/^#(?!EXT)/m.test(e[g])) g += 1;else {
          var h = Pf(b, e[g]);if (Rf.includes(h.name)) {
            if (1 != c) throw new A(2, 4, 4017);e = e.splice(g, e.length - g);b = Sf(b, d, e, f);return new Bf(d, c, f, b);
          }f.push(h);g += 1;"EXT-X-STREAM-INF" == h.name && (h.a.push(new Df("URI", e[g])), g += 1);
        }
      }return new Bf(d, c, f);
    }function Sf(b, c, d, e) {
      var f = [],
          g = [];d.forEach(function (d) {
        if (/^(#EXT)/.test(d)) d = Pf(b, d), Qf.includes(d.name) ? e.push(d) : g.push(d);else {
          if (/^#(?!EXT)/m.test(d)) return [];d = dd([c], [d.trim()])[0];f.push(new Ff(d, g));g = [];
        }
      });return f;
    }
    function Pf(b, c) {
      a: {
        var d = b.a++;var e = c.match(/^#(EXT[^:]*)(?::(.*))?$/);if (!e) throw new A(2, 4, 4016, c);var f = e[1],
            g = e[2];e = [];if (g && g.includes("=")) {
          g = new Jf(g);for (var h, k = /([^=]+)=(?:"([^"]*)"|([^",]*))(?:,|$)/g; h = Lf(g, k);) {
            e.push(new Df(h[1], h[2] || h[3]));
          }
        } else if (g) {
          d = new Cf(d, f, e, g);break a;
        }d = new Cf(d, f, e);
      }return d;
    }var Qf = "EXT-X-TARGETDURATION EXT-X-MEDIA-SEQUENCE EXT-X-DISCONTINUITY-SEQUENCE EXT-X-PLAYLIST-TYPE EXT-X-MAP EXT-X-I-FRAMES-ONLY EXT-X-ENDLIST".split(" "),
        Rf = "EXTINF EXT-X-BYTERANGE EXT-X-DISCONTINUITY EXT-X-PROGRAM-DATE-TIME EXT-X-KEY EXT-X-DATERANGE".split(" ");function Tf(b) {
      try {
        var c = Tf.parse(b);return hb({ uri: b, data: c.data, headers: { "content-type": c.contentType } });
      } catch (d) {
        return fb(d);
      }
    }y("shaka.net.DataUriPlugin", Tf);
    Tf.parse = function (b) {
      var c = b.split(":");if (2 > c.length || "data" != c[0]) throw new A(2, 1, 1004, b);c = c.slice(1).join(":").split(",");if (2 > c.length) throw new A(2, 1, 1004, b);var d = c[0];c = window.decodeURIComponent(c.slice(1).join(","));d = d.split(";");var e = null;1 < d.length && (e = d[1]);if ("base64" == e) b = Zb(c).buffer;else {
        if (e) throw new A(2, 1, 1005, b);b = Wb(c);
      }return { data: b, contentType: d[0] };
    };wb("data", Tf);function Uf() {
      this.g = this.c = null;this.P = 1;this.v = new Map();this.M = new Set();this.a = new Map();this.b = null;this.s = "";this.o = new Nf();this.j = this.i = null;this.f = Vf;this.m = null;this.u = 0;this.B = Infinity;this.h = new tb();this.J = [];
    }y("shaka.hls.HlsParser", Uf);n = Uf.prototype;n.configure = function (b) {
      this.g = b;
    };n.start = function (b, c) {
      this.c = c;return Wf(this, b).then(function (b) {
        this.s = b.uri;return Xf(this, b.data).then(function () {
          Yf(this, this.i);return this.m;
        }.bind(this));
      }.bind(this));
    };
    n.stop = function () {
      this.g = this.c = null;this.v.clear();this.M.clear();this.a.clear();this.m = null;return this.h.destroy();
    };n.update = function () {
      if (this.f != Zf.Ca) {
        for (var b = [], c = q(this.a.values()), d = c.next(); !d.done; d = c.next()) {
          b.push($f(this, d.value));
        }return Promise.all(b);
      }
    };
    function $f(b, c) {
      Wf(b, c.Td).then(function (b) {
        var d = Zf,
            f = Of(this.o, b.data, b.uri);if (1 != f.type) throw new A(2, 4, 4017);b = Hf(f.a, "EXT-X-MEDIA-SEQUENCE");var g = c.stream;ag(this, c.Ub, f, b ? Number(b.value) : 0, g.mimeType, g.codecs).then(function (b) {
          c.rb.a = b;b = b[b.length - 1];Hf(f.a, "EXT-X-ENDLIST") && (bg(this, d.Ca), this.b.la(b.endTime));
        }.bind(this));
      }.bind(b));
    }n.onExpirationUpdated = function () {};
    function Xf(b, c) {
      var d = Of(b.o, c, b.s);if (0 != d.type) throw new A(2, 4, 4022);return cg(b, d).then(function (b) {
        this.c.filterAllPeriods([b]);for (var c = Infinity, d = 0, e = Infinity, k = q(this.a.values()), l = k.next(); !l.done; l = k.next()) {
          l = l.value, c = Math.min(c, l.pc), d = Math.max(d, l.pc), "text" != l.stream.type && (e = Math.min(e, l.duration));
        }this.f != Zf.Ca ? (this.b = new W(0, 3 * this.u), this.b.tb(!1)) : (this.b = new W(null, 0), this.b.tb(!0));dg(this);if (this.f != Zf.Ca) {
          this.i = this.B;this.f == Zf.Ic && (c = this.b.Sb, isNaN(this.g.availabilityWindowOverride) || (c = this.g.availabilityWindowOverride), this.b.Dc(c));for (c = 0; 95443.7176888889 <= d;) {
            c += 95443.7176888889, d -= 95443.7176888889;
          }if (c) for (d = q(this.a.values()), l = d.next(); !l.done; l = d.next()) {
            e = l.value, 95443.7176888889 > e.pc && (e.stream.presentationTimeOffset = -c, e.rb.offset(c));
          }
        } else for (this.b.la(e), this.b.offset(-c), d = q(this.a.values()), l = d.next(); !l.done; l = d.next()) {
          l = l.value, l.stream.presentationTimeOffset = c, l.rb.offset(-c), Ke(l.rb, e);
        }this.m = { presentationTimeline: this.b, periods: [b], offlineSessionIds: [], minBufferTime: 0 };
      }.bind(b));
    }
    function cg(b, c) {
      var d = c.a,
          e = Gf(c.a, "EXT-X-MEDIA").filter(function (b) {
        return "SUBTITLES" == eg(b, "TYPE");
      }.bind(b)).map(function (b) {
        return fg(this, b);
      }.bind(b));return Promise.all(e).then(function (b) {
        var e = Gf(d, "EXT-X-STREAM-INF").map(function (b) {
          return lg(this, b, c);
        }.bind(this));return Promise.all(e).then(function (c) {
          return { startTime: 0, variants: c.reduce(H.Zb, []), textStreams: b };
        }.bind(this));
      }.bind(b));
    }
    function lg(b, c, d) {
      var e = Ef(c, "CODECS", "avc1.42E01E,mp4a.40.2").split(/\s*,\s*/),
          f = c.getAttribute("RESOLUTION"),
          g = null,
          h = null,
          k = Ef(c, "FRAME-RATE"),
          l = Number(eg(c, "BANDWIDTH"));if (f) {
        var m = f.value.split("x");g = m[0];h = m[1];
      }d = Gf(d.a, "EXT-X-MEDIA");var p = Ef(c, "AUDIO"),
          t = Ef(c, "VIDEO");p ? d = If(d, "AUDIO", p) : t && (d = If(d, "VIDEO", t));if (m = mg("text", e)) {
        var w = Ef(c, "SUBTITLES");w && (w = If(d, "SUBTITLES", w), w.length && (b.v.get(w[0].id).stream.codecs = m));ob(e, m);
      }d = d.map(function (b) {
        return ng(this, b, e);
      }.bind(b));var x = [],
          B = [];return Promise.all(d).then(function (b) {
        p ? x = b : t && (B = b);b = !1;if (x.length || B.length) {
          if (x.length) {
            if (eg(c, "URI") == x[0].Ub) {
              var d = "audio";b = !0;
            } else d = "video";
          } else d = "audio";
        } else 1 == e.length ? (d = mg("video", e), d = f || k || d ? "video" : "audio") : (d = "video", e = [e.join(",")]);return b ? Promise.resolve() : og(this, c, e, d);
      }.bind(b)).then(function (b) {
        b && ("audio" == b.stream.type ? x = [b] : B = [b]);B && pg(B);x && pg(x);return qg(this, x, B, l, g, h, k);
      }.bind(b));
    }
    function pg(b) {
      b.forEach(function (b) {
        var c = b.stream.codecs.split(",");c = c.filter(function (b) {
          return "mp4a.40.34" != b;
        });b.stream.codecs = c.join(",");
      });
    }
    function qg(b, c, d, e, f, g, h) {
      d.forEach(function (b) {
        if (b = b.stream) b.width = Number(f) || void 0, b.height = Number(g) || void 0, b.frameRate = Number(h) || void 0;
      }.bind(b));c.length || (c = [null]);d.length || (d = [null]);for (var k = [], l = 0; l < c.length; l++) {
        for (var m = 0; m < d.length; m++) {
          var p = c[l] ? c[l].stream : null,
              t = d[m] ? d[m].stream : null,
              w = c[l] ? c[l].drmInfos : null,
              x = d[m] ? d[m].drmInfos : null,
              B = void 0;if (p && t) {
            if (w.length && x.length ? 0 < Fc(w, x).length : 1) B = Fc(w, x);else continue;
          } else p ? B = w : t && (B = x);w = (d[l] ? d[l].Ub : "") + " - " + (c[l] ? c[l].Ub : "");b.M.has(w) || (p = rg(b, p, t, e, B), k.push(p), b.M.add(w));
        }
      }return k;
    }function rg(b, c, d, e, f) {
      return { id: b.P++, language: c ? c.language : "und", primary: !!c && c.primary || !!d && d.primary, audio: c, video: d, bandwidth: e, drmInfos: f, allowedByApplication: !0, allowedByKeySystem: !0 };
    }function fg(b, c) {
      eg(c, "TYPE");return ng(b, c, []).then(function (b) {
        return b.stream;
      });
    }
    function ng(b, c, d) {
      var e = eg(c, "URI");if (b.a.has(e)) return Promise.resolve(b.a.get(e));var f = eg(c, "TYPE").toLowerCase();"subtitles" == f && (f = "text");var g = I(Ef(c, "LANGUAGE", "und")),
          h = Ef(c, "NAME"),
          k = c.getAttribute("DEFAULT"),
          l = c.getAttribute("AUTOSELECT"),
          m = Ef(c, "CHANNELS");return sg(b, e, d, f, g, !!k || !!l, h, "audio" == f ? tg(m) : null).then(function (b) {
        if (this.a.has(e)) return this.a.get(e);this.v.set(c.id, b);this.a.set(e, b);return b;
      }.bind(b));
    }
    function tg(b) {
      if (!b) return null;b = b.split("/")[0];return parseInt(b, 10);
    }function og(b, c, d, e) {
      var f = eg(c, "URI");return b.a.has(f) ? Promise.resolve(b.a.get(f)) : sg(b, f, d, e, "und", !1, null, null).then(function (b) {
        if (this.a.has(f)) return this.a.get(f);this.a.set(f, b);return b;
      }.bind(b));
    }
    function sg(b, c, d, e, f, g, h, k) {
      var l = dd([b.s], [c])[0],
          m,
          p = "",
          t;return Wf(b, l).then(function (c) {
        l = c.uri;m = Of(b.o, c.data, l);if (1 != m.type) throw new A(2, 4, 4017);c = m;var f = Zf,
            g = Hf(c.a, "EXT-X-PLAYLIST-TYPE"),
            h = Hf(c.a, "EXT-X-ENDLIST");h = g && "VOD" == g.value || h;g = g && "EVENT" == g.value && !h;g = !h && !g;h ? bg(b, f.Ca) : (g ? bg(b, f.Ic) : bg(b, f.Od), c = ug(c.a, "EXT-X-TARGETDURATION"), c = Number(c.value), b.u = Math.max(c, b.u), b.B = Math.min(c, b.B));if (1 == d.length) p = d[0];else if (c = mg(e, d), null != c) p = c;else throw new A(2, 4, 4025, d);return vg(b, e, p, m);
      }).then(function (d) {
        t = d;d = Hf(m.a, "EXT-X-MEDIA-SEQUENCE");return ag(b, c, m, d ? Number(d.value) : 0, t, p);
      }).then(function (d) {
        var w = d[0].startTime,
            B = d[d.length - 1].endTime,
            R = B - w;d = new U(d);var Q = wg(m),
            O = void 0;"text" == e && (O = "subtitle");var V = [];m.segments.forEach(function (b) {
          b = Gf(b.b, "EXT-X-KEY");V.push.apply(V, b);
        });var oa = !1,
            va = [],
            Y = null;V.forEach(function (b) {
          if ("NONE" != eg(b, "METHOD")) {
            oa = !0;var c = eg(b, "KEYFORMAT");if (b = (c = xg[c]) ? c(b) : null) b.keyIds.length && (Y = b.keyIds[0]), va.push(b);
          }
        });if (oa && !va.length) throw new A(2, 4, 4026);return { stream: { id: b.P++, originalId: h, createSegmentIndex: Promise.resolve.bind(Promise), findSegmentPosition: d.find.bind(d), getSegmentReference: d.get.bind(d), initSegmentReference: Q, presentationTimeOffset: 0, mimeType: t, codecs: p, kind: O, encrypted: oa, keyId: Y, language: f, label: h, type: e, primary: g, trickModeVideo: null, emsgSchemeIdUris: null, frameRate: void 0, width: void 0, height: void 0, bandwidth: void 0, roles: [], channelsCount: k, closedCaptions: null }, rb: d, drmInfos: va, Ub: c, Td: l, pc: w, ag: B, duration: R };
      });
    }
    function wg(b) {
      var c = Gf(b.a, "EXT-X-MAP");if (!c.length) return null;if (1 < c.length) throw new A(2, 4, 4020);c = c[0];var d = eg(c, "URI"),
          e = dd([b.b], [d])[0];b = 0;d = null;if (c = Ef(c, "BYTERANGE")) b = c.split("@"), c = Number(b[0]), b = Number(b[1]), d = b + c - 1;return new Be(function () {
        return [e];
      }, b, d);
    }
    function yg(b, c, d, e) {
      var f = c.b,
          g = c.a;c = ug(f, "EXTINF").value.split(",");c = e + Number(c[0]);var h = 0,
          k = null;if (f = Hf(f, "EXT-X-BYTERANGE")) h = f.value.split("@"), f = Number(h[0]), h = h[1] ? Number(h[1]) : b.a + 1, k = h + f - 1;return new N(d, e, c, function () {
        return [g];
      }, h, k);
    }function dg(b) {
      b.b && (b.J.forEach(function (c) {
        b.b.Wa(c, 0);
      }), b.J = []);
    }
    function ag(b, c, d, e, f, g) {
      var h = d.segments,
          k = [],
          l = h[0].a,
          m = yg(null, h[0], e, 0);d = wg(d);return zg(b, c, d, m, f, g).then(function (b) {
        l.split("/").pop();for (var c = 0; c < h.length; ++c) {
          var d = k[k.length - 1];d = yg(d, h[c], e + c, 0 == c ? b : d.endTime);k.push(d);
        }this.J.push(k);dg(this);return k;
      }.bind(b));
    }
    function Ag(b, c) {
      var d = b.c.networkingEngine,
          e = xb(c.c(), b.g.retryParameters),
          f = {},
          g = c.b;f.Range = "bytes=" + g + "-" + (g + 2048 - 1);var h = {};if (0 != g || null != c.a) g = "bytes=" + g + "-", null != c.a && (g += c.a), h.Range = g;e.headers = f;f = d.request(1, e);ub(b.h, f);return f.promise["catch"](function () {
        Ka("Unable to fetch a partial HLS segment! Falling back to a full segment request, which is expensive!  Your server should support Range requests and CORS preflights.", e.uris[0]);e.headers = h;var c = d.request(1, e);ub(b.h, c);return c.promise;
      });
    }
    function zg(b, c, d, e, f, g) {
      if (b.m && (c = b.a.get(c).rb.get(e.position))) return Promise.resolve(c.startTime);e = [Ag(b, e)];if ("video/mp4" == f || "audio/mp4" == f) d ? e.push(Ag(b, d)) : e.push(e[0]);return Promise.all(e).then(function (b) {
        if ("video/mp4" == f || "audio/mp4" == f) return Bg(b[0].data, b[1].data);if ("audio/mpeg" == f) return 0;if ("video/mp2t" == f) return Cg(b[0].data);if ("application/mp4" == f || f.startsWith("text/")) {
          b = b[0].data;var c = Kb(f, g);if (nd(c)) {
            var d = new ld(null);od(d, c);b = d.gc(b);
          } else b = 0;return b;
        }throw new A(2, 4, 4030);
      }.bind(b));
    }function Bg(b, c) {
      var d = 0;new S().F("moov", T).F("trak", T).F("mdia", T).$("mdhd", function (b) {
        b.reader.I(0 == b.version ? 8 : 16);d = b.reader.C();b.parser.stop();
      }).parse(c, !0);if (!d) throw new A(2, 4, 4030);var e = 0,
          f = !1;new S().F("moof", T).F("traf", T).$("tfdt", function (b) {
        e = (0 == b.version ? b.reader.C() : b.reader.$a()) / d;f = !0;b.parser.stop();
      }).parse(b, !0);if (!f) throw new A(2, 4, 4030);return e;
    }
    function Cg(b) {
      function c() {
        throw new A(2, 4, 4030);
      }b = new P(new DataView(b), 0);for (var d = 0, e = 0;;) {
        if (d = b.V(), e = b.ea(), 71 != e && c(), b.ob() & 16384 || c(), e = (b.ea() & 48) >> 4, 0 != e && 2 != e || c(), 3 == e && (e = b.ea(), b.I(e)), 1 != b.C() >> 8) b.seek(d + 188), e = b.ea(), 71 != e && (b.seek(d + 192), e = b.ea()), 71 != e && (b.seek(d + 204), e = b.ea()), 71 != e && c(), b.xd(1);else return b.I(3), d = b.ea() >> 6, 0 != d && 1 != d || c(), 0 == b.ea() && c(), d = b.ea(), e = b.ob(), b = b.ob(), (1073741824 * ((d & 14) >> 1) + ((e & 65534) << 14 | (b & 65534) >> 1)) / 9E4;
      }
    }
    function mg(b, c) {
      for (var d = Dg[b], e = 0; e < d.length; e++) {
        for (var f = 0; f < c.length; f++) {
          if (d[e].test(c[f].trim())) return c[f].trim();
        }
      }return "text" == b ? "" : null;
    }
    function vg(b, c, d, e) {
      e = e.segments[0].a;var f = new Na(e).ca.split(".").pop(),
          g = Eg[c][f];if (g) return Promise.resolve(g);if ("text" == c) return d && "vtt" != d ? Promise.resolve("application/mp4") : Promise.resolve("text/vtt");c = xb([e], b.g.retryParameters);c.method = "HEAD";c = b.c.networkingEngine.request(1, c);ub(b.h, c);return c.promise.then(function (b) {
        b = b.headers["content-type"];if (!b) throw new A(2, 4, 4021, f);return b.split(";")[0];
      });
    }
    function eg(b, c) {
      var d = b.getAttribute(c);if (!d) throw new A(2, 4, 4023, c);return d.value;
    }function ug(b, c) {
      var d = Hf(b, c);if (!d) throw new A(2, 4, 4024, c);return d;
    }function Wf(b, c) {
      var d = b.c.networkingEngine.request(0, xb([c], b.g.retryParameters));ub(b.h, d);return d.promise;
    }
    var Dg = { audio: [/^vorbis$/, /^opus$/, /^flac$/, /^mp4a/, /^[ae]c-3$/], video: [/^avc/, /^hev/, /^hvc/, /^vp0?[89]/, /^av1$/], text: [/^vtt$/, /^wvtt/, /^stpp/] },
        Eg = { audio: { mp4: "audio/mp4", m4s: "audio/mp4", m4i: "audio/mp4", m4a: "audio/mp4", ts: "video/mp2t" }, video: { mp4: "video/mp4", m4s: "video/mp4", m4i: "video/mp4", m4v: "video/mp4", ts: "video/mp2t" }, text: { mp4: "application/mp4", m4s: "application/mp4", m4i: "application/mp4", vtt: "text/vtt", ttml: "application/ttml+xml" } };
    Uf.prototype.X = function () {
      this.c && (this.j = null, this.update().then(function () {
        Yf(this, this.i);
      }.bind(this))["catch"](function (b) {
        this.c && (b.severity = 1, this.c.onError(b), Yf(this, 0));
      }.bind(this)));
    };function Yf(b, c) {
      null != b.i && null != c && (b.j = window.setTimeout(b.X.bind(b), 1E3 * c));
    }function bg(b, c) {
      b.f = c;b.b && b.b.tb(b.f == Zf.Ca);b.f == Zf.Ca && null != b.j && (window.clearTimeout(b.j), b.j = null, b.i = null);
    }
    var xg = { "urn:uuid:edef8ba9-79d6-4ace-a3c8-27dcd51d21ed": function urnUuidEdef8ba979d64aceA3c827dcd51d21ed(b) {
        var c = eg(b, "METHOD");if (!["SAMPLE-AES", "SAMPLE-AES-CTR", "SAMPLE-AES-CENC"].includes(c)) return null;c = eg(b, "URI");c = Tf.parse(c);c = new Uint8Array(c.data);c = ed("com.widevine.alpha", [{ initDataType: "cenc", initData: c }]);if (b = Ef(b, "KEYID")) c.keyIds = [b.substr(2).toLowerCase()];return c;
      } },
        Vf = "VOD",
        Zf = { Ca: Vf, Od: "EVENT", Ic: "LIVE" };hf.m3u8 = Uf;gf["application/x-mpegurl"] = Uf;gf["application/vnd.apple.mpegurl"] = Uf;function Fg() {
      this.a = {};
    }function Gg(b, c, d, e) {
      b.a[c] = b.a[c] || new Hg();b.a[c].a[d] = e;
    }Fg.prototype.get = function (b, c) {
      var d = this.a[b];return d ? d.get(c) : null;
    };function Hg() {
      this.a = {};
    }Hg.prototype.get = function (b) {
      return this.a[b];
    };function Ig(b, c) {
      this.a = b;this.b = new Set([b]);c = c || [];for (var d = q(c), e = d.next(); !e.done; e = d.next()) {
        this.add(e.value);
      }
    }Ig.prototype.add = function (b) {
      return Jg(this.a, b) ? (this.b.add(b), !0) : !1;
    };function Jg(b, c) {
      var d;if (!(d = !!b.audio != !!c.audio || !!b.video != !!c.video || b.language != c.language) && (d = b.audio && c.audio)) {
        d = b.audio;var e = c.audio;d = !(d.channelsCount == e.channelsCount && Kg(d, e) && Lg(d.roles, e.roles));
      }!d && (d = b.video && c.video) && (d = b.video, e = c.video, d = !(Kg(d, e) && Lg(d.roles, e.roles)));return d ? !1 : !0;
    }
    Ig.prototype.values = function () {
      return this.b.values();
    };function Kg(b, c) {
      if (b.mimeType != c.mimeType) return !1;var d = b.codecs.split(",").map(function (b) {
        return Nb(b)[0];
      }),
          e = c.codecs.split(",").map(function (b) {
        return Nb(b)[0];
      });if (d.length != e.length) return !1;d.sort();e.sort();for (var f = 0; f < d.length; f++) {
        if (d[f] != e[f]) return !1;
      }return !0;
    }
    function Lg(b, c) {
      var d = new Set(b),
          e = new Set(c);d["delete"]("main");e["delete"]("main");if (d.size != e.size) return !1;d = q(d);for (var f = d.next(); !f.done; f = d.next()) {
        if (!e.has(f.value)) return !1;
      }return !0;
    };function Mg(b) {
      this.a = b;this.b = new Ng(b.language, "", b.audio && b.audio.channelsCount ? b.audio.channelsCount : 0);
    }Mg.prototype.create = function (b) {
      var c = this,
          d = b.filter(function (b) {
        return Jg(c.a, b);
      });return d.length ? new Ig(d[0], d) : this.b.create(b);
    };function Ng(b, c, d) {
      this.c = b;this.b = c;this.a = d;
    }
    Ng.prototype.create = function (b) {
      var c = [];c = Og(b, this.c);var d = b.filter(function (b) {
        return b.primary;
      });c = c.length ? c : d.length ? d : b;this.b && (b = Pg(c, this.b), b.length && (c = b));this.a && (b = J.Wc(c, this.a), b.length && (c = b));b = new Ig(c[0]);c = q(c);for (d = c.next(); !d.done; d = c.next()) {
        d = d.value, Jg(b.a, d) && b.add(d);
      }return b;
    };function Og(b, c) {
      var d = I(c),
          e = Jd(d, b.map(function (b) {
        return Id(b);
      }));return e ? b.filter(function (b) {
        return e == Id(b);
      }) : [];
    }
    function Pg(b, c) {
      return b.filter(function (b) {
        var d = b.audio;b = b.video;return d && 0 <= d.roles.indexOf(c) || b && 0 <= b.roles.indexOf(c);
      });
    };function Qg(b, c, d, e) {
      this.a = b;this.v = c;this.s = d;this.u = e;this.h = new Cb();this.b = null;this.g = !1;this.o = b.readyState;this.c = !1;this.j = this.B = -1;this.f = this.i = !1;c = this.m.bind(this);G(this.h, b, "waiting", c);this.b = new Xb(c);this.b.pb(.25);
    }Qg.prototype.destroy = function () {
      var b = this.h.destroy();this.u = this.v = this.a = this.h = null;null != this.b && (this.b.cancel(), this.b = null);return b;
    };Qg.prototype.nb = function () {
      this.f = !0;this.m();
    };
    Qg.prototype.m = function () {
      if (0 != this.a.readyState) {
        if (this.a.seeking) {
          if (!this.g) return;
        } else this.g = !1;if (!this.a.paused) {
          this.a.readyState != this.o && (this.c = !1, this.o = this.a.readyState);var b = this.s.smallGapLimit,
              c = this.a.currentTime,
              d = this.a.buffered;a: {
            if (d && d.length && !(1 == d.length && 1E-6 > d.end(0) - d.start(0))) {
              var e = .1;/(Edge\/|Trident\/|Tizen)/.test(navigator.userAgent) && (e = .5);for (var f = 0; f < d.length; f++) {
                if (d.start(f) > c && (0 == f || d.end(f - 1) - c <= e)) {
                  e = f;break a;
                }
              }
            }e = null;
          }if (null == e) {
            if (d = this.a.currentTime, c = this.a.buffered, !this.a.paused && 0 < this.a.playbackRate) if (this.j != d) this.j = d, this.B = Date.now(), this.i = !1;else if (!this.i && this.B < Date.now() - 1E3) for (e = 0; e < c.length; e++) {
              if (d >= c.start(e) && d < c.end(e) - .5) {
                this.a.currentTime += .1;this.j = this.a.currentTime;this.i = !0;break;
              }
            }
          } else if (0 != e || this.f) {
            f = d.start(e);var g = this.v.qa();if (!(f >= g)) {
              g = f - c;b = g <= b;var h = !1;.001 > g || (b || this.c || (this.c = !0, c = new D("largegap", { currentTime: c, gapSize: g }), c.cancelable = !0, this.u(c), this.s.jumpLargeGaps && !c.defaultPrevented && (h = !0)), !b && !h) || (0 != e && d.end(e - 1), this.a.currentTime = f);
            }
          }
        }
      }
    };function Rg(b, c, d) {
      this.a = b;this.i = c;this.h = d;this.c = new Cb();this.f = 1;this.g = !1;this.b = null;0 < b.readyState ? this.nd() : Fb(this.c, b, "loadedmetadata", this.nd.bind(this));G(this.c, b, "ratechange", this.Qe.bind(this));
    }n = Rg.prototype;n.destroy = function () {
      var b = this.c.destroy();this.c = null;null != this.b && (this.b.cancel(), this.b = null);this.i = this.a = null;return b;
    };function Sg(b) {
      return 0 < b.a.readyState ? b.a.currentTime : b.h;
    }function Tg(b, c) {
      0 < b.a.readyState ? Ug(b, b.a.currentTime, c) : (b.h = c, setTimeout(b.i, 0));
    }
    n.hb = function () {
      return this.f;
    };function Vg(b, c) {
      null != b.b && (b.b.cancel(), b.b = null);b.f = c;b.a.playbackRate = b.g || 0 > c ? 0 : c;!b.g && 0 > c && (b.b = new Xb(function () {
        b.a.currentTime += c / 4;
      }), b.b.pb(.25));
    }n.Qe = function () {
      var b = this.g || 0 > this.f ? 0 : this.f;this.a.playbackRate && this.a.playbackRate != b && Vg(this, this.a.playbackRate);
    };n.nd = function () {
      .001 > Math.abs(this.a.currentTime - this.h) ? this.od() : (Fb(this.c, this.a, "seeking", this.od.bind(this)), this.a.currentTime = 0 == this.a.currentTime ? this.h : this.a.currentTime);
    };
    n.od = function () {
      var b = this;G(this.c, this.a, "seeking", function () {
        return b.i();
      });
    };function Ug(b, c, d) {
      function e() {
        !b.a || 10 <= f++ || b.a.currentTime != c || (b.a.currentTime = d, setTimeout(e, 100));
      }b.a.currentTime = d;var f = 0;setTimeout(e, 100);
    };function Wg(b, c, d, e, f, g, h) {
      this.c = b;this.a = c;this.m = d;this.h = e;this.j = g;this.f = null;this.g = new Qg(b, c, e, h);c = this.Se.bind(this);null == f ? f = Infinity > this.a.S() ? this.a.Qa() : this.a.qa() : 0 > f && (f = this.a.qa() + f);f = Xg(this, Yg(this, f));this.b = new Rg(b, c, f);this.f = new Xb(this.Pe.bind(this));this.f.pb(.25);
    }n = Wg.prototype;n.destroy = function () {
      var b = Promise.all([this.b.destroy(), this.g.destroy()]);this.g = this.b = null;null != this.f && (this.f.cancel(), this.f = null);this.j = this.h = this.a = this.c = null;return b;
    };
    function Zg(b) {
      var c = Sg(b.b);0 < b.c.readyState && (b.c.paused || (c = Yg(b, c)));return c;
    }n.hb = function () {
      return this.b.hb();
    };n.nb = function () {
      this.g.nb();
    };n.Pe = function () {
      if (0 != this.c.readyState && !this.c.paused) {
        var b = this.c.currentTime,
            c = this.a.Qa(),
            d = this.a.qa();3 > d - c && (c = d - 3);b < c && (b = $g(this, b), this.c.currentTime = b);
      }
    };n.Se = function () {
      var b = this.g;b.g = !0;b.f = !1;b.c = !1;var c = Sg(this.b);b = $g(this, c);if (.001 < Math.abs(b - c) && (c = new Date().getTime() / 1E3, !this.i || this.i < c - 1)) {
        this.i = c;Tg(this.b, b);return;
      }this.j();
    };
    function Xg(b, c) {
      var d = b.a.S();return c >= d ? d - b.h.durationBackoff : c;
    }function $g(b, c) {
      var d = Lc.bind(null, b.c.buffered),
          e = Math.max(b.m, b.h.rebufferingGoal),
          f = b.a.Qa(),
          g = b.a.qa(),
          h = b.a.S();3 > g - f && (f = g - 3);var k = b.a.ib(e),
          l = b.a.ib(5);e = b.a.ib(e + 5);return c >= h ? Xg(b, c) : c > g ? g : c < f ? d(l) ? l : e : c >= k || d(c) ? c : e;
    }function Yg(b, c) {
      var d = b.a.Qa();if (c < d) return d;d = b.a.qa();return c > d ? d : c;
    };function ah(b) {
      this.a = !1;this.b = new z();this.c = b;
    }ah.prototype.destroy = function () {
      var b = this;if (this.a) return this.b;this.a = !0;return this.c().then(function () {
        b.b.resolve();
      }, function () {
        b.b.resolve();
      });
    };function bh(b, c) {
      return r(function e() {
        return v(e, function (e) {
          switch (e.l) {case 1:
              return pa(e, 2), u(e, Promise.resolve(c()), 4);case 4:
              return e["return"](e.A);case 2:
              return sa(e), u(e, Promise.all(b.map(function (b) {
                return b.destroy();
              })), 5);case 5:
              ta(e, 0);}
        });
      });
    };function ch(b, c, d, e, f, g, h) {
      var k = this;this.a = b;this.J = c;this.s = d;this.m = e;this.h = f;this.u = g;this.f = [];this.j = new Cb();this.c = !1;this.i = -1;this.g = null;this.b = h;this.B = new ah(function () {
        var b = Promise.all([k.j ? k.j.destroy() : null, k.b ? k.b.destroy() : null]);k.j = null;dh(k);k.a = null;k.s = null;k.m = null;k.h = null;k.u = null;k.f = [];k.b = null;return b;
      });eh(this);
    }ch.prototype.destroy = function () {
      return this.B.destroy();
    };
    function fh(b, c) {
      if (!b.f.some(function (b) {
        return b.info.schemeIdUri == c.schemeIdUri && b.info.startTime == c.startTime && b.info.endTime == c.endTime;
      })) {
        var d = { info: c, status: 1 };b.f.push(d);var e = new D("timelineregionadded", { detail: gh(c) });b.h(e);b.o(!0, d);
      }
    }function gh(b) {
      var c = mb(b);c.eventElement = b.eventElement;return c;
    }
    ch.prototype.o = function (b, c) {
      var d = c.info.startTime > this.a.currentTime ? 1 : c.info.endTime < this.a.currentTime ? 3 : 2,
          e = 2 == c.status,
          f = 2 == d;if (d != c.status) {
        if (!b || e || f) e || this.h(new D("timelineregionenter", { detail: gh(c.info) })), f || this.h(new D("timelineregionexit", { detail: gh(c.info) }));c.status = d;
      }
    };function eh(b) {
      dh(b);b.g = window.setTimeout(b.v.bind(b), 250);
    }function dh(b) {
      b.g && (window.clearTimeout(b.g), b.g = null);
    }
    ch.prototype.v = function () {
      this.g = null;eh(this);var b = J.pa(this.b.a, this.a.currentTime);b != this.i && (-1 != this.i && this.u(), this.i = b);b = Mc(this.a.buffered, this.a.currentTime);var c = Gc(this.a.buffered);var d = this.b;c = c || 0;var e = d.a.presentationTimeline,
          f = e.Ra();c = e.W() && c >= f;e = d.b;e = e.g ? "ended" == e.g.readyState : !0;d = c || e || d.c.ended;this.c ? (c = Math.max(this.J, this.s.rebufferingGoal), (d || b >= c) && 0 != this.c && (this.c = !1, this.m(!1))) : !d && .5 > b && 1 != this.c && (this.c = !0, this.m(!0));this.f.forEach(this.o.bind(this, !1));
    };
    function hh(b, c, d) {
      this.c = b;this.b = c;this.a = d;
    }hh.prototype.destroy = function () {
      this.a = this.b = this.c = null;return Promise.resolve();
    };function ih(b, c) {
      this.a = c;this.b = b;this.g = null;this.j = 1;this.o = Promise.resolve();this.h = [];this.i = new Map();this.c = new Map();this.s = !1;this.B = null;this.v = this.f = this.m = !1;this.u = 0;
    }n = ih.prototype;n.destroy = function () {
      for (var b = q(this.c.values()), c = b.next(); !c.done; c = b.next()) {
        jh(c.value);
      }this.c.clear();this.i.clear();this.g = this.h = this.o = this.b = this.a = null;this.f = !0;return Promise.resolve();
    };
    n.configure = function (b) {
      this.g = b;this.B = new bb({ maxAttempts: Math.max(b.retryParameters.maxAttempts, 2), baseDelay: b.retryParameters.baseDelay, backoffFactor: b.retryParameters.backoffFactor, fuzzFactor: b.retryParameters.fuzzFactor, timeout: 0 }, !0);
    };n.init = function () {
      var b = Zg(this.a.Ia);b = this.a.gd(this.b.periods[J.pa(this.b, b)]);return b.variant || b.text ? kh(this, b).then(function () {
        !this.f && this.a && this.a.Ie && this.a.Ie();
      }.bind(this)) : Promise.reject(new A(2, 5, 5005));
    };
    function lh(b) {
      var c = Zg(b.a.Ia);return b.b.periods[J.pa(b.b, c)];
    }function mh(b) {
      var c = b.c.get("video");return c ? b.b.periods[c.wa] : (c = b.c.get("audio")) ? b.b.periods[c.wa] : null;
    }function nh(b) {
      return oh(b, "audio");
    }function ph(b) {
      return oh(b, "video");
    }function oh(b, c) {
      var d = b.c.get(c);return d ? d.xa || d.stream : null;
    }
    function qh(b, c) {
      return r(function e() {
        var f, g, h, k, l, m, p, t;return v(e, function (e) {
          switch (e.l) {case 1:
              return f = fd, Bd(b.a.K, f.Oa), b.u++, b.v = !1, g = b.u, h = b.a.K, k = new Map(), l = new Set(), k.set(f.Oa, c), l.add(c), u(e, h.init(k, !1), 2);case 2:
              return b.f ? e["return"]() : u(e, rh(b, l), 3);case 3:
              if (b.f) return e["return"]();b.u != g || b.c.has(f.Oa) || b.v || (m = Zg(b.a.Ia), p = J.pa(b.b, m), t = sh(c, p), b.c.set(f.Oa, t), th(b, t, 0));e.l = 0;}
        });
      });
    }function uh(b) {
      b.v = !0;var c = b.c.get("text");c && (jh(c), b.c["delete"]("text"));
    }
    function vh(b, c) {
      var d = b.c.get("video");if (d) {
        var e = d.stream;if (e) if (c) {
          var f = e.trickModeVideo;f && !d.xa && (wh(b, f, !1, 0), d.xa = e);
        } else if (e = d.xa) d.xa = null, wh(b, e, !0, 0);
      }
    }function xh(b, c, d, e) {
      c.video && wh(b, c.video, d, e);c.audio && wh(b, c.audio, d, e);
    }
    function wh(b, c, d, e) {
      var f = b.c.get(c.type);if (!f && "text" == c.type && b.g.ignoreTextStreamFailures) qh(b, c);else if (f) {
        var g = J.oa(b.b, c);d && g != f.wa ? yh(b) : (f.xa && (c.trickModeVideo ? (f.xa = c, c = c.trickModeVideo) : f.xa = null), (g = b.h[g]) && g.ab && (g = b.i.get(c.id)) && g.ab && f.stream != c && ("text" == c.type && ud(b.a.K, Kb(c.mimeType, c.codecs)), f.stream = c, f.Nb = !0, d && (f.Da ? f.Vb = !0 : f.Ha ? (f.Ba = !0, f.Fb = e, f.Vb = !0) : (jh(f), zh(b, f, !0, e)))));
      }
    }
    function Ah(b) {
      var c = Zg(b.a.Ia),
          d = b.g.smallGapLimit;Array.from(b.c.keys()).every(function (e) {
        var f = b.a.K;"text" == e ? (e = f.a, e = c >= e.a && c < e.b) : (e = wd(f, e), e = Lc(e, c, d));return e;
      }) || yh(b);
    }function yh(b) {
      b.c.forEach(function (c, d) {
        c.Da || c.Ba || (c.Ha ? (c.Ba = !0, c.Fb = 0) : null == vd(b.a.K, d) ? null == c.Aa && th(b, c, 0) : (jh(c), zh(b, c, !1, 0)));
      });
    }
    function kh(b, c, d) {
      return r(function f() {
        var g, h, k, l, m, p, t;return v(f, function (f) {
          switch (f.l) {case 1:
              return g = Zg(b.a.Ia), h = J.pa(b.b, g), k = fd, l = new Map(), m = new Set(), c.variant && c.variant.audio && (l.set(k.Md, c.variant.audio), m.add(c.variant.audio)), c.variant && c.variant.video && (l.set(k.Rd, c.variant.video), m.add(c.variant.video)), c.text && (l.set(k.Oa, c.text), m.add(c.text)), p = b.a.K, t = b.g.forceTransmuxTS, u(f, p.init(l, t), 2);case 2:
              if (b.f) return f["return"]();Bh(b);return u(f, rh(b, m), 3);case 3:
              if (b.f) return f["return"]();
              l.forEach(function (c, f) {
                if (!b.c.has(f)) {
                  var g = sh(c, h, d);b.c.set(f, g);th(b, g, 0);
                }
              });f.l = 0;}
        });
      });
    }function sh(b, c, d) {
      return { stream: b, type: b.type, Ua: null, ra: null, xa: null, Nb: !0, wa: c, endOfStream: !1, Ha: !1, Aa: null, Ba: !1, Fb: 0, Vb: !1, Da: !1, yc: !1, kb: !1, wd: d || 0 };
    }
    function Ch(b, c) {
      var d = b.h[c];if (d) return d.promise;d = { promise: new z(), ab: !1 };b.h[c] = d;for (var e = new Set(), f = q(b.b.periods[c].variants), g = f.next(); !g.done; g = f.next()) {
        g = g.value, g.video && e.add(g.video), g.video && g.video.trickModeVideo && e.add(g.video.trickModeVideo), g.audio && e.add(g.audio);
      }f = q(b.b.periods[c].textStreams);for (g = f.next(); !g.done; g = f.next()) {
        e.add(g.value);
      }b.o = b.o.then(function () {
        if (!this.f) return rh(this, e);
      }.bind(b)).then(function () {
        this.f || (this.h[c].promise.resolve(), this.h[c].ab = !0);
      }.bind(b))["catch"](function (b) {
        this.f || (this.h[c].promise["catch"](function () {}), this.h[c].promise.reject(), delete this.h[c], this.a.onError(b));
      }.bind(b));return d.promise;
    }
    function rh(b, c) {
      return r(function e() {
        var f, g, h, k, l, m, p;return v(e, function (e) {
          switch (e.l) {case 1:
              f = [];for (var t = q(c), x = t.next(); !x.done; x = t.next()) {
                g = x.value, (h = b.i.get(g.id)) ? f.push(h.promise) : (b.i.set(g.id, { promise: new z(), ab: !1 }), f.push(g.createSegmentIndex()));
              }na(e, 2);return u(e, Promise.all(f), 4);case 4:
              if (b.f) return e["return"]();qa(e, 3);break;case 2:
              k = ra(e);if (b.f) return e["return"]();e = q(c);for (x = e.next(); !x.done; x = e.next()) {
                l = x.value, b.i.get(l.id).promise["catch"](function () {}), b.i.get(l.id).promise.reject(), b.i["delete"](l.id);
              }throw k;case 3:
              t = q(c);for (x = t.next(); !x.done; x = t.next()) {
                m = x.value, p = b.i.get(m.id), p.ab || (p.promise.resolve(), p.ab = !0);
              }e.l = 0;}
        });
      });
    }function Bh(b) {
      var c = b.b.presentationTimeline.S();Infinity > c ? b.a.K.la(c) : b.a.K.la(Math.pow(2, 32));
    }
    n.Kf = function (b) {
      if (!this.f && !b.Ha && null != b.Aa && !b.Da) if (b.Aa = null, b.Ba) zh(this, b, b.Vb, b.Fb);else {
        try {
          var c = Dh(this, b);null != c && (th(this, b, c), b.kb = !1);
        } catch (d) {
          Eh(this, d);return;
        }c = Array.from(this.c.values());Fh(this, b);c.every(function (b) {
          return b.endOfStream;
        }) && this.a.K.endOfStream().then(function () {
          if (!this.f) {
            var b = this.a.K.S();b < this.b.presentationTimeline.S() && this.b.presentationTimeline.la(b);
          }
        }.bind(this));
      }
    };
    function Dh(b, c) {
      function d(b) {
        return "text" == b.type && "application/cea-608" == b.stream.mimeType;
      }if (d(c)) return b.a.K.Tb(c.stream.originalId || ""), null;var e = Zg(b.a.Ia),
          f = Gh(b, c, e),
          g = J.oa(b.b, c.stream),
          h = J.pa(b.b, f),
          k = yd(b.a.K, c.type, e),
          l = Math.max(b.b.minBufferTime || 0, b.g.rebufferingGoal, b.g.bufferingGoal) * b.j;if (f >= b.b.presentationTimeline.S()) return c.endOfStream = !0, "video" == c.type && (f = b.c.get("text")) && "application/cea-608" == f.stream.mimeType && (f.endOfStream = !0), null;c.endOfStream = !1;c.wa = h;if (h != g) return null;if (k >= l) return .5;h = xd(b.a.K, c.type);h = Hh(b, c, e, h, g);if (!h) return 1;var m = Infinity;Array.from(b.c.values()).forEach(function (c) {
        d(c) || (m = Math.min(m, Gh(b, c, e)));
      });if (f >= m + b.b.presentationTimeline.a) return 1;c.wd = 0;Ih(b, c, e, g, h);return null;
    }function Gh(b, c, d) {
      return c.Ua && c.ra ? b.b.periods[J.oa(b.b, c.Ua)].startTime + c.ra.endTime : Math.max(d, c.wd);
    }
    function Hh(b, c, d, e, f) {
      if (c.ra && c.stream == c.Ua) return Jh(b, c, f, c.ra.position + 1);d = c.ra ? c.stream.findSegmentPosition(Math.max(0, b.b.periods[J.oa(b.b, c.Ua)].startTime + c.ra.endTime - b.b.periods[f].startTime)) : c.stream.findSegmentPosition(Math.max(0, (e || d) - b.b.periods[f].startTime));if (null == d) return null;var g = null;null == e && (g = Jh(b, c, f, Math.max(0, d - 1)));return g || Jh(b, c, f, d);
    }
    function Jh(b, c, d, e) {
      d = b.b.periods[d];c = c.stream.getSegmentReference(e);if (!c) return null;e = b.b.presentationTimeline;b = e.jb();e = e.Ra();return d.startTime + c.endTime < b || d.startTime + c.startTime > e ? null : c;
    }
    function Ih(b, c, d, e, f) {
      var g = b.b.periods[e],
          h = c.stream,
          k = b.b.presentationTimeline.S(),
          l = b.b.periods[e + 1];e = Kh(b, c, e, Math.max(0, g.startTime - .1), l ? l.startTime : k);c.Ha = !0;c.Nb = !1;k = Lh(b, f);Promise.all([e, k]).then(function (b) {
        if (!this.f && !this.m) return Mh(this, c, d, g, h, f, b[1]);
      }.bind(b)).then(function () {
        this.f || this.m || (c.Ha = !1, c.yc = !1, c.Ba || this.a.nb(), th(this, c, 0), Nh(this, h));
      }.bind(b))["catch"](function (b) {
        this.f || this.m || (c.Ha = !1, "text" == c.type && this.g.ignoreTextStreamFailures ? this.c["delete"]("text") : 3017 == b.code ? Oh(this, c, b) : (c.kb = !0, b.severity = 2, Eh(this, b)));
      }.bind(b));
    }function Oh(b, c, d) {
      if (!Array.from(b.c.values()).some(function (b) {
        return b != c && b.yc;
      })) {
        var e = Math.round(100 * b.j);if (20 < e) b.j -= .2;else if (4 < e) b.j -= .04;else {
          c.kb = !0;b.m = !0;b.a.onError(d);return;
        }c.yc = !0;
      }th(b, c, 4);
    }
    function Kh(b, c, d, e, f) {
      if (!c.Nb) return Promise.resolve();d = Cd(b.a.K, c.type, b.b.periods[d].startTime - c.stream.presentationTimeOffset, e, f);if (!c.stream.initSegmentReference) return d;b = Lh(b, c.stream.initSegmentReference).then(function (b) {
        if (!this.f) return zd(this.a.K, c.type, b, null, null, c.stream.closedCaptions && 0 < c.stream.closedCaptions.size);
      }.bind(b))["catch"](function (b) {
        c.Nb = !0;return Promise.reject(b);
      });return Promise.all([d, b]);
    }
    function Mh(b, c, d, e, f, g, h) {
      var k = f.closedCaptions && 0 < f.closedCaptions.size;null != f.emsgSchemeIdUris && 0 < f.emsgSchemeIdUris.length && new S().$("emsg", b.cf.bind(b, e, g, f.emsgSchemeIdUris)).parse(h);return Ph(b, c, d).then(function () {
        if (!this.f) return zd(this.a.K, c.type, h, g.startTime + e.startTime, g.endTime + e.startTime, k);
      }.bind(b)).then(function () {
        if (!this.f) return c.Ua = f, c.ra = g, Promise.resolve();
      }.bind(b));
    }
    n.cf = function (b, c, d, e) {
      var f = e.reader.wc(),
          g = e.reader.wc(),
          h = e.reader.C(),
          k = e.reader.C(),
          l = e.reader.C(),
          m = e.reader.C();e = e.reader.Ja(e.reader.H.byteLength - e.reader.V());b = b.startTime + c.startTime + k / h;if (d.includes(f)) if ("urn:mpeg:dash:event:2012" == f) this.a.Je();else this.a.onEvent(new D("emsg", { detail: { startTime: b, endTime: b + l / h, schemeIdUri: f, value: g, timescale: h, presentationTimeDelta: k, eventDuration: l, id: m, messageData: e } }));
    };
    function Ph(b, c, d) {
      var e = Math.max(b.g.bufferBehind, b.b.presentationTimeline.a),
          f = vd(b.a.K, c.type);if (null == f) return Promise.resolve();d = d - f - e;return 0 >= d ? Promise.resolve() : b.a.K.remove(c.type, f, f + d).then(function () {}.bind(b));
    }
    function Nh(b, c) {
      if (!b.s && (b.s = Array.from(b.c.values()).every(function (b) {
        return "text" == b.type ? !0 : !b.Ba && !b.Da && b.ra;
      }), b.s)) {
        var d = J.oa(b.b, c);b.h[d] || Ch(b, d).then(function () {
          this.f || this.a.fd();
        }.bind(b))["catch"](H.Ga);for (d = 0; d < b.b.periods.length; ++d) {
          Ch(b, d)["catch"](H.Ga);
        }b.a.Ve && b.a.Ve();
      }
    }
    function Fh(b, c) {
      if (c.wa != J.oa(b.b, c.stream)) {
        var d = c.wa,
            e = Array.from(b.c.values());e.every(function (b) {
          return b.wa == d;
        }) && e.every(Qh) && Ch(b, d).then(function () {
          if (!this.f && e.every(function (b) {
            var c = J.oa(this.b, b.stream);return Qh(b) && b.wa == d && c != d;
          }.bind(this))) {
            var b = this.b.periods[d],
                c = this.a.gd(b),
                h = new Map();c.variant && c.variant.video && h.set("video", c.variant.video);c.variant && c.variant.audio && h.set("audio", c.variant.audio);c.text && h.set("text", c.text);var k = q(this.c.keys());for (c = k.next(); !c.done; c = k.next()) {
              if (c = c.value, !h.has(c) && "text" != c) {
                this.a.onError(new A(2, 5, 5005));return;
              }
            }k = q(Array.from(h.keys()));for (c = k.next(); !c.done; c = k.next()) {
              if (c = c.value, !this.c.has(c)) if ("text" == c) kh(this, { text: h.get("text") }, b.startTime), h["delete"](c);else {
                this.a.onError(new A(2, 5, 5005));return;
              }
            }b = q(Array.from(this.c.keys()));for (c = b.next(); !c.done; c = b.next()) {
              c = c.value, (k = h.get(c)) ? (wh(this, k, !1, 0), th(this, this.c.get(c), 0)) : this.c["delete"](c);
            }this.a.fd();
          }
        }.bind(b))["catch"](H.Ga);
      }
    }
    function Qh(b) {
      return !b.Ha && null == b.Aa && !b.Ba && !b.Da;
    }function Lh(b, c) {
      var d = xb(c.c(), b.g.retryParameters);if (0 != c.b || null != c.a) {
        var e = "bytes=" + c.b + "-";null != c.a && (e += c.a);d.headers.Range = e;
      }return b.a.Ob.request(1, d).promise.then(function (b) {
        return b.data;
      });
    }
    function zh(b, c, d, e) {
      r(function g() {
        var h, k, l;return v(g, function (g) {
          switch (g.l) {case 1:
              return c.Ba = !1, c.Vb = !1, c.Fb = 0, c.Da = !0, e ? (k = Zg(b.a.Ia), l = b.a.K.S(), h = b.a.K.remove(c.type, k + e, l)) : h = Bd(b.a.K, c.type).then(function () {
                if (!this.f && d) return this.a.K.flush(c.type);
              }.bind(b)), u(g, h, 2);case 2:
              if (b.f) return g["return"]();c.Ua = null;c.ra = null;c.Da = !1;c.endOfStream = !1;th(b, c, 0);g.l = 0;}
        });
      });
    }function th(b, c, d) {
      c.Aa = window.setTimeout(b.Kf.bind(b, c), 1E3 * d);
    }
    function jh(b) {
      null != b.Aa && (window.clearTimeout(b.Aa), b.Aa = null);
    }function Eh(b, c) {
      eb(b.B).then(function () {
        this.f || (this.a.onError(c), c.handled || this.g.failureCallback(c));
      }.bind(b));
    };function Rh(b, c, d, e, f, g) {
      if (200 <= d && 299 >= d && 202 != d) return f && (e = f), { uri: e, data: c, headers: b, fromCache: !!b["x-shaka-from-cache"] };f = null;try {
        f = Vb(c);
      } catch (h) {}throw new A(401 == d || 403 == d ? 2 : 1, 1, 1001, e, d, f, b, g);
    };function Sh(b, c, d, e) {
      var f = new Sh.b();Ib(c.headers).forEach(function (b, c) {
        f.append(c, b);
      });var g = new Sh.a(),
          h = { body: c.body || void 0, headers: f, method: c.method, signal: g.signal, credentials: c.allowCrossSiteCredentials ? "include" : void 0 },
          k = { Pc: !1, Id: !1 },
          l;c.retryParameters.timeout && (l = setTimeout(function () {
        k.Id = !0;g.abort();
      }, c.retryParameters.timeout));b = Sh.h(b, d, h, k, l, e);return new C(b, function () {
        k.Pc = !0;g.abort();return Promise.resolve();
      });
    }y("shaka.net.HttpFetchPlugin", Sh);
    Sh.h = function (b, c, d, e, f, g) {
      return r(function k() {
        var l, m, p, t, w, x, B, R, Q, O, V, oa;return v(k, function (k) {
          switch (k.l) {case 1:
              return l = Sh.g, m = Sh.c, x = w = 0, B = Date.now(), na(k, 2, 3), u(k, l(b, d), 5);case 5:
              return p = k.A, R = p.clone().body.getReader(), Q = function Q(b) {
                function c() {
                  return r(function Hc() {
                    var d, e;return v(Hc, function (f) {
                      switch (f.l) {case 1:
                          return u(f, R.read(), 2);case 2:
                          d = f.A;d.done || (w += d.value.byteLength);e = Date.now();if (100 < e - B || d.done) g(e - B, w - x), x = w, B = e;d.done ? b.close() : (b.enqueue(d.value), c());f.l = 0;}
                    });
                  });
                }
                c();
              }, new m({ start: Q }), u(k, p.arrayBuffer(), 6);case 6:
              t = k.A;case 3:
              sa(k);clearTimeout(f);ta(k, 4);break;case 2:
              O = ra(k);if (e.Pc) throw new A(1, 1, 7001, b, c);if (e.Id) throw new A(1, 1, 1003, b, c);throw new A(1, 1, 1002, b, O, c);case 4:
              return V = {}, oa = p.headers, oa.forEach(function (b, c) {
                V[c.trim()] = b;
              }), k["return"](Rh(V, t, p.status, b, p.url, c));}
        });
      });
    };Sh.isSupported = function () {
      if (window.ReadableStream) try {
        new ReadableStream({});
      } catch (b) {
        return !1;
      } else return !1;return !(!window.fetch || !window.AbortController);
    };
    Sh.isSupported = Sh.isSupported;Sh.g = window.fetch;Sh.a = window.AbortController;Sh.c = window.ReadableStream;Sh.b = window.Headers;Sh.isSupported() && (wb("http", Sh, 2), wb("https", Sh, 2));function Th(b, c, d, e) {
      var f = new Th.f(),
          g = Date.now(),
          h = 0,
          k = new Promise(function (k, m) {
        f.open(c.method, b, !0);f.responseType = "arraybuffer";f.timeout = c.retryParameters.timeout;f.withCredentials = c.allowCrossSiteCredentials;f.onabort = function () {
          m(new A(1, 1, 7001, b, d));
        };f.onload = function (c) {
          c = c.target;var e = c.getAllResponseHeaders().trim().split("\r\n"),
              f = {};e = q(e);for (var g = e.next(); !g.done; g = e.next()) {
            g = g.value.split(": "), f[g[0].toLowerCase()] = g.slice(1).join(": ");
          }try {
            var h = Rh(f, c.response, c.status, b, c.responseURL, d);k(h);
          } catch (Q) {
            m(Q);
          }
        };f.onerror = function (c) {
          m(new A(1, 1, 1002, b, c, d));
        };f.ontimeout = function () {
          m(new A(1, 1, 1003, b, d));
        };f.onprogress = function (b) {
          var c = Date.now();if (100 < c - g || b.lengthComputable && b.loaded == b.total) e(c - g, b.loaded - h), h = b.loaded, g = c;
        };for (var l in c.headers) {
          f.setRequestHeader(l.toLowerCase(), c.headers[l]);
        }f.send(c.body);
      });return new C(k, function () {
        f.abort();return Promise.resolve();
      });
    }y("shaka.net.HttpXHRPlugin", Th);Th.f = window.XMLHttpRequest;wb("http", Th, 1);wb("https", Th, 1);function Uh(b) {
      this.b = new Map();this.c = Promise.resolve();this.h = !1;this.i = b;this.f = this.a = this.g = 0;
    }Uh.prototype.destroy = function () {
      this.h = !0;var b = this.c["catch"](function () {});this.c = Promise.resolve();return b;
    };function Vh(b, c, d, e, f) {
      var g = b.b.get(c) || [];g.push({ request: d, Rc: e, Ge: f });b.b.set(c, g);
    }
    function Wh(b, c) {
      var d = Array.from(b.b.values());b.b.clear();for (var e = q(d), f = e.next(); !f.done; f = e.next()) {
        f = q(f.value);for (var g = f.next(); !g.done; g = f.next()) {
          b.a += g.value.Rc;
        }
      }var h = Promise.all(d.map(function (d) {
        return Xh(b, c, d);
      }));b.c = b.c.then(function () {
        return h;
      });return h;
    }function Xh(b, c, d) {
      var e = Promise.resolve();d.forEach(function (d) {
        e = e.then(function () {
          Yh(b);return Zh(b, c, d);
        });
      });return e;
    }
    function Zh(b, c, d) {
      return Promise.resolve().then(function () {
        Yh(b);return c.request(1, d.request).promise;
      }).then(function (c) {
        Yh(b);b.g += d.Rc;b.f += c.data.byteLength;b.i(b.a ? b.g / b.a : 0, b.f);return d.Ge(c.data);
      });
    }function Yh(b) {
      if (b.h) throw new A(2, 9, 7001);
    };function $h(b, c) {
      var d = this;this.c = b;this.b = b.objectStore(c);this.a = new z();b.onabort = function (b) {
        b.preventDefault();d.a.reject();
      };b.onerror = function (b) {
        b.preventDefault();d.a.reject();
      };b.oncomplete = function () {
        d.a.resolve();
      };
    }$h.prototype.abort = function () {
      try {
        this.c.abort();
      } catch (b) {}return this.a["catch"](function () {});
    };
    function ai(b, c) {
      return new Promise(function (d, e) {
        var f = b.b.openCursor();f.onerror = e;f.onsuccess = function (b) {
          b = b.target.result;if (!b) return d();c(b.key, b.value, b);b["continue"]();
        };
      });
    }$h.prototype.store = function () {
      return this.b;
    };$h.prototype.promise = function () {
      return this.a;
    };function bi(b) {
      this.b = b;this.a = [];
    }bi.prototype.destroy = function () {
      return Promise.all(this.a.map(function (b) {
        return b.abort();
      }));
    };function ci(b, c) {
      return di(b, c, "readonly");
    }function ei(b, c) {
      return di(b, c, "readwrite");
    }function di(b, c, d) {
      d = b.b.transaction([c], d);var e = new $h(d, c);b.a.push(e);e.promise().then(function () {
        ob(b.a, e);
      }, function () {
        ob(b.a, e);
      });return e;
    };function fi(b) {
      this.a = new bi(b);
    }fi.prototype.destroy = function () {
      return this.a.destroy();
    };fi.prototype.getAll = function () {
      var b = this;return r(function d() {
        var e, f;return v(d, function (d) {
          switch (d.l) {case 1:
              return e = ci(b.a, "session-ids"), f = [], u(d, ai(e, function (b, d) {
                f.push(d);
              }), 2);case 2:
              return u(d, e.promise(), 3);case 3:
              return d["return"](f);}
        });
      });
    };fi.prototype.add = function (b) {
      var c = ei(this.a, "session-ids"),
          d = c.store();b = q(b);for (var e = b.next(); !e.done; e = b.next()) {
        d.add(e.value);
      }return c.promise();
    };
    fi.prototype.remove = function (b) {
      var c = this;return r(function e() {
        var f;return v(e, function (e) {
          switch (e.l) {case 1:
              return f = ei(c.a, "session-ids"), u(e, ai(f, function (c, e, f) {
                0 <= b.indexOf(e.sessionId) && f["delete"]();
              }), 2);case 2:
              return u(e, f.promise(), 0);}
        });
      });
    };function gi() {
      this.a = new Map();
    }gi.prototype.destroy = function () {
      for (var b = [], c = q(this.a.values()), d = c.next(); !d.done; d = c.next()) {
        b.push(d.value.destroy());
      }this.a.clear();return Promise.all(b);
    };gi.prototype.init = function () {
      var b = this;hi.forEach(function (c, d) {
        var e = c();e && b.a.set(d, e);
      });for (var c = [], d = q(this.a.values()), e = d.next(); !e.done; e = d.next()) {
        c.push(e.value.init());
      }return Promise.all(c);
    };
    function ii(b) {
      var c = null;b.a.forEach(function (b, e) {
        b.getCells().forEach(function (b, d) {
          b.hasFixedKeySpace() || c || (c = { path: { ja: e, U: d }, U: b });
        });
      });if (c) return c;throw new A(2, 9, 9013, "Could not find a cell that supports add-operations");
    }function ji(b, c) {
      b.a.forEach(function (b, e) {
        b.getCells().forEach(function (b, d) {
          c({ ja: e, U: d }, b);
        });
      });
    }
    function ki(b, c, d) {
      b = b.a.get(c);if (!b) throw new A(2, 9, 9013, "Could not find mechanism with name " + c);c = b.getCells().get(d);if (!c) throw new A(2, 9, 9013, "Could not find cell with name " + d);return c;
    }function li(b, c) {
      b.a.forEach(function (b) {
        c(b.getEmeSessionCell());
      });
    }function mi(b) {
      var c = Array.from(b.a.keys());if (!c.length) throw new A(2, 9, 9E3, "No supported storage mechanisms found");return b.a.get(c[0]).getEmeSessionCell();
    }
    gi.prototype.erase = function () {
      var b = this;return r(function d() {
        var e, f, g;return v(d, function (d) {
          switch (d.l) {case 1:
              return e = Array.from(b.a.values()), f = 0 < e.length, f || (g = hi, g.forEach(function (b) {
                (b = b()) && e.push(b);
              })), u(d, Promise.all(e.map(function (b) {
                return b.erase();
              })), 2);case 2:
              if (f) d.D(0);else return u(d, Promise.all(e.map(function (b) {
                return b.destroy();
              })), 0);}
        });
      });
    };function ni(b, c) {
      hi.set(b, c);
    }y("shaka.offline.StorageMuxer.register", ni);y("shaka.offline.StorageMuxer.unregister", function (b) {
      hi["delete"](b);
    });
    function oi() {
      for (var b = q(hi.values()), c = b.next(); !c.done; c = b.next()) {
        if (c = c.value, c = c()) return c.destroy(), !0;
      }return !1;
    }var hi = new Map();function pi(b) {
      this.a = new bi(b);
    }n = pi.prototype;n.destroy = function () {
      return this.a.destroy();
    };n.hasFixedKeySpace = function () {
      return !0;
    };n.addSegments = function () {
      return qi("segment");
    };n.removeSegments = function (b, c) {
      return ri(this, "segment", b, c);
    };n.getSegments = function (b) {
      return si(this, "segment", b).then(function (b) {
        return b.map(ti);
      });
    };n.addManifests = function () {
      return qi("manifest");
    };
    n.updateManifestExpiration = function (b, c) {
      var d = ei(this.a, "manifest"),
          e = d.store(),
          f = new z();e.get(b).onsuccess = function (d) {
        (d = d.target.result) ? (d.expiration = c, e.put(d), f.resolve()) : f.reject(new A(2, 9, 9012, "Could not find values for " + b));
      };return d.promise().then(function () {
        return f;
      });
    };n.removeManifests = function (b, c) {
      return ri(this, "manifest", b, c);
    };n.getManifests = function (b) {
      return si(this, "manifest", b).then(function (b) {
        return b.map(ui);
      });
    };
    n.getAllManifests = function () {
      var b = this;return r(function d() {
        var e, f, g;return v(d, function (d) {
          switch (d.l) {case 1:
              return e = ui, f = ci(b.a, "manifest"), g = new Map(), u(d, ai(f, function (b, d) {
                g.set(b, e(d));
              }), 2);case 2:
              return u(d, f.promise(), 3);case 3:
              return d["return"](g);}
        });
      });
    };function qi(b) {
      return Promise.reject(new A(2, 9, 9011, "Cannot add new value to " + b));
    }function ri(b, c, d, e) {
      b = ei(b.a, c);var f = b.store();d.forEach(function (b) {
        f["delete"](b).onsuccess = function () {
          return e(b);
        };
      });return b.promise();
    }
    function si(b, c, d) {
      b = ci(b.a, c);var e = b.store(),
          f = {},
          g = [];d.forEach(function (b) {
        e.get(b).onsuccess = function (c) {
          c = c.target.result;void 0 == c && g.push(b);f[b] = c;
        };
      });return b.promise().then(function () {
        return g.length ? Promise.reject(new A(2, 9, 9012, "Could not find values for " + g)) : d.map(function (b) {
          return f[b];
        });
      });
    }
    function ui(b) {
      return { originalManifestUri: b.originalManifestUri, duration: b.duration, size: b.size, expiration: null == b.expiration ? Infinity : b.expiration, periods: b.periods.map(vi), sessionIds: b.sessionIds, drmInfo: b.drmInfo, appMetadata: b.appMetadata };
    }function vi(b) {
      wi(b);b.streams.forEach(function () {});return { startTime: b.startTime, streams: b.streams.map(xi) };
    }
    function xi(b) {
      var c = b.ze ? yi(b.ze) : null;return { id: b.id, originalId: null, primary: b.primary, presentationTimeOffset: b.presentationTimeOffset, contentType: b.contentType, mimeType: b.mimeType, codecs: b.codecs, frameRate: b.frameRate, kind: b.kind, language: b.language, label: b.label, width: b.width, height: b.height, initSegmentKey: c, encrypted: b.encrypted, keyId: b.keyId, segments: b.segments.map(zi), variantIds: b.variantIds };
    }function zi(b) {
      var c = yi(b.uri);return { startTime: b.startTime, endTime: b.endTime, dataKey: c };
    }
    function ti(b) {
      return { data: b.data };
    }function yi(b) {
      var c;if ((c = /^offline:[0-9]+\/[0-9]+\/([0-9]+)$/.exec(b)) || (c = /^offline:segment\/([0-9]+)$/.exec(b))) return Number(c[1]);throw new A(2, 9, 9004, "Could not parse uri " + b);
    }
    function wi(b) {
      var c = b.streams.filter(function (b) {
        return "audio" == b.contentType;
      }),
          d = b.streams.filter(function (b) {
        return "video" == b.contentType;
      });if (!c.every(function (b) {
        return b.variantIds;
      }) || !d.every(function (b) {
        return b.variantIds;
      })) {
        c.forEach(function (b) {
          b.variantIds = [];
        });d.forEach(function (b) {
          b.variantIds = [];
        });var e = 0;if (d.length && !c.length) {
          var f = e++;d.forEach(function (b) {
            b.variantIds.push(f);
          });
        }if (!d.length && c.length) {
          var g = e++;c.forEach(function (b) {
            b.variantIds.push(g);
          });
        }d.length && c.length && c.forEach(function (b) {
          d.forEach(function (c) {
            var d = e++;b.variantIds.push(d);c.variantIds.push(d);
          });
        });
      }
    };function Ai(b, c, d, e) {
      this.a = new bi(b);this.c = c;this.b = d;this.f = e;
    }n = Ai.prototype;n.destroy = function () {
      return this.a.destroy();
    };n.hasFixedKeySpace = function () {
      return this.f;
    };n.addSegments = function (b) {
      return Bi(this, this.c, b);
    };n.removeSegments = function (b, c) {
      return Ci(this, this.c, b, c);
    };n.getSegments = function (b) {
      return Di(this, this.c, b);
    };n.addManifests = function (b) {
      return Bi(this, this.b, b);
    };
    n.updateManifestExpiration = function (b, c) {
      var d = ei(this.a, this.b),
          e = d.store();e.get(b).onsuccess = function (d) {
        if (d = d.target.result) d.expiration = c, e.put(d, b);
      };return d.promise();
    };n.removeManifests = function (b, c) {
      return Ci(this, this.b, b, c);
    };n.getManifests = function (b) {
      return Di(this, this.b, b);
    };
    n.getAllManifests = function () {
      var b = this;return r(function d() {
        var e, f;return v(d, function (d) {
          switch (d.l) {case 1:
              return e = ci(b.a, b.b), f = new Map(), u(d, ai(e, function (b, d) {
                f.set(b, d);
              }), 2);case 2:
              return u(d, e.promise(), 3);case 3:
              return d["return"](f);}
        });
      });
    };
    function Bi(b, c, d) {
      if (b.f) return Promise.reject(new A(1, 9, 9011, "Cannot add new value to " + c));b = ei(b.a, c);var e = b.store(),
          f = [];d.forEach(function (b) {
        e.add(b).onsuccess = function (b) {
          f.push(b.target.result);
        };
      });return b.promise().then(function () {
        return f;
      });
    }function Ci(b, c, d, e) {
      b = ei(b.a, c);var f = b.store();d.forEach(function (b) {
        f["delete"](b).onsuccess = function () {
          return e(b);
        };
      });return b.promise();
    }
    function Di(b, c, d) {
      b = ci(b.a, c);var e = b.store(),
          f = {},
          g = [];d.forEach(function (b) {
        var c = e.get(b);c.onsuccess = function () {
          void 0 == c.result && g.push(b);f[b] = c.result;
        };
      });return b.promise().then(function () {
        return g.length ? Promise.reject(new A(1, 9, 9012, "Could not find values for " + g)) : d.map(function (b) {
          return f[b];
        });
      });
    };function Ei() {
      this.g = this.c = this.b = this.a = this.f = null;
    }n = Ei.prototype;
    n.init = function () {
      var b = this,
          c = new z(),
          d = window.indexedDB.open("shaka_offline_db", 4);d.onsuccess = function (d) {
        d = d.target.result;b.f = d;var e = d.objectStoreNames;e = e.contains("manifest") && e.contains("segment") ? new pi(d) : null;b.a = e;e = d.objectStoreNames;e = e.contains("manifest-v2") && e.contains("segment-v2") ? new Ai(d, "segment-v2", "manifest-v2", !0) : null;b.b = e;e = d.objectStoreNames;e = e.contains("manifest-v3") && e.contains("segment-v3") ? new Ai(d, "segment-v3", "manifest-v3", !1) : null;b.c = e;d = d.objectStoreNames.contains("session-ids") ? new fi(d) : null;b.g = d;c.resolve();
      };d.onupgradeneeded = function (b) {
        b = b.target.result;for (var c = q(["segment-v3", "manifest-v3", "session-ids"]), d = c.next(); !d.done; d = c.next()) {
          d = d.value, b.objectStoreNames.contains(d) || b.createObjectStore(d, { autoIncrement: !0 });
        }
      };d.onerror = function (b) {
        c.reject(new A(2, 9, 9001, d.error));b.preventDefault();
      };return c;
    };
    n.destroy = function () {
      var b = this;return r(function d() {
        return v(d, function (d) {
          switch (d.l) {case 1:
              if (!b.a) {
                d.D(2);break;
              }return u(d, b.a.destroy(), 2);case 2:
              if (!b.b) {
                d.D(4);break;
              }return u(d, b.b.destroy(), 4);case 4:
              if (!b.c) {
                d.D(6);break;
              }return u(d, b.c.destroy(), 6);case 6:
              if (!b.g) {
                d.D(8);break;
              }return u(d, b.g.destroy(), 8);case 8:
              b.f && b.f.close(), d.l = 0;}
        });
      });
    };n.getCells = function () {
      var b = new Map();this.a && b.set("v1", this.a);this.b && b.set("v2", this.b);this.c && b.set("v3", this.c);return b;
    };n.getEmeSessionCell = function () {
      return this.g;
    };
    n.erase = function () {
      var b = this;return r(function d() {
        return v(d, function (d) {
          switch (d.l) {case 1:
              if (!b.a) {
                d.D(2);break;
              }return u(d, b.a.destroy(), 2);case 2:
              if (!b.b) {
                d.D(4);break;
              }return u(d, b.b.destroy(), 4);case 4:
              if (!b.c) {
                d.D(6);break;
              }return u(d, b.c.destroy(), 6);case 6:
              return b.f && b.f.close(), u(d, Fi(), 8);case 8:
              return b.f = null, b.a = null, b.b = null, b.c = null, u(d, b.init(), 0);}
        });
      });
    };
    function Fi() {
      var b = new z(),
          c = window.indexedDB.deleteDatabase("shaka_offline_db");c.onblocked = function () {};c.onsuccess = function () {
        b.resolve();
      };c.onerror = function (d) {
        b.reject(new A(2, 9, 9001, c.error));d.preventDefault();
      };return b;
    }ni("idb", function () {
      return window.indexedDB ? new Ei() : null;
    });function Gi(b, c, d, e) {
      this.a = b;this.g = c;this.f = d;this.c = e;this.b = ["offline:", b, "/", c, "/", d, "/", e].join("");
    }Gi.prototype.ja = function () {
      return this.g;
    };Gi.prototype.U = function () {
      return this.f;
    };Gi.prototype.key = function () {
      return this.c;
    };Gi.prototype.toString = function () {
      return this.b;
    };
    function Hi(b) {
      b = /^offline:([a-z]+)\/([^/]+)\/([^/]+)\/([0-9]+)$/.exec(b);if (null == b) return null;var c = b[1];if ("manifest" != c && "segment" != c) return null;var d = b[2];if (!d) return null;var e = b[3];return e && null != c ? new Gi(c, d, e, Number(b[4])) : null;
    };function Ii(b, c) {
      this.b = b;this.a = c;
    }function Ji(b, c) {
      var d = new W(null, 0);d.la(c.duration);var e = c.periods.map(function (c) {
        return Ki(b, c, d);
      }),
          f = c.drmInfo ? [c.drmInfo] : [];c.drmInfo && e.forEach(function (b) {
        b.variants.forEach(function (b) {
          b.drmInfos = f;
        });
      });return { presentationTimeline: d, minBufferTime: 2, offlineSessionIds: c.sessionIds, periods: e };
    }
    function Ki(b, c, d) {
      var e = c.streams.filter(function (b) {
        return "audio" == b.contentType;
      }),
          f = c.streams.filter(function (b) {
        return "video" == b.contentType;
      });e = Li(b, e, f);f = c.streams.filter(function (b) {
        return "text" == b.contentType;
      }).map(function (c) {
        return Mi(b, c);
      });c.streams.forEach(function (e) {
        e = e.segments.map(function (c, d) {
          return Ni(b, d, c);
        });d.Wa(e, c.startTime);
      });return { startTime: c.startTime, variants: Array.from(e.values()), textStreams: f };
    }
    function Li(b, c, d) {
      for (var e = new Set(), f = q(c), g = f.next(); !g.done; g = f.next()) {
        var h = q(g.value.variantIds);for (g = h.next(); !g.done; g = h.next()) {
          e.add(g.value);
        }
      }f = q(d);for (g = f.next(); !g.done; g = f.next()) {
        for (h = q(g.value.variantIds), g = h.next(); !g.done; g = h.next()) {
          e.add(g.value);
        }
      }f = new Map();e = q(e);for (g = e.next(); !g.done; g = e.next()) {
        g = g.value, f.set(g, { id: g, language: "", primary: !1, audio: null, video: null, bandwidth: 0, drmInfos: [], allowedByApplication: !0, allowedByKeySystem: !0 });
      }c = q(c);for (e = c.next(); !e.done; e = c.next()) {
        for (e = e.value, g = Mi(b, e), h = q(e.variantIds), e = h.next(); !e.done; e = h.next()) {
          e = f.get(e.value), e.language = g.language, e.primary = e.primary || g.primary, e.audio = g;
        }
      }d = q(d);for (c = d.next(); !c.done; c = d.next()) {
        for (e = c.value, c = Mi(b, e), g = q(e.variantIds), e = g.next(); !e.done; e = g.next()) {
          e = f.get(e.value), e.primary = e.primary || c.primary, e.video = c;
        }
      }return f;
    }
    function Mi(b, c) {
      var d = c.segments.map(function (c, d) {
        return Ni(b, d, c);
      }),
          e = new U(d);d = { id: c.id, originalId: c.originalId, createSegmentIndex: function createSegmentIndex() {
          return Promise.resolve();
        }, findSegmentPosition: function findSegmentPosition(b) {
          return e.find(b);
        }, getSegmentReference: function getSegmentReference(b) {
          return e.get(b);
        }, initSegmentReference: null, presentationTimeOffset: c.presentationTimeOffset, mimeType: c.mimeType, codecs: c.codecs, width: c.width || void 0, height: c.height || void 0, frameRate: c.frameRate || void 0, kind: c.kind, encrypted: c.encrypted, keyId: c.keyId,
        language: c.language, label: c.label || null, type: c.contentType, primary: c.primary, trickModeVideo: null, emsgSchemeIdUris: null, roles: [], channelsCount: null, closedCaptions: null };null != c.initSegmentKey && (d.initSegmentReference = Oi(b, c.initSegmentKey));return d;
    }function Ni(b, c, d) {
      var e = new Gi("segment", b.b, b.a, d.dataKey);return new N(c, d.startTime, d.endTime, function () {
        return [e.toString()];
      }, 0, null);
    }function Oi(b, c) {
      var d = new Gi("segment", b.b, b.a, c);return new Be(function () {
        return [d.toString()];
      }, 0, null);
    };function Pi() {
      this.a = null;
    }n = Pi.prototype;n.configure = function () {};n.start = function (b) {
      var c = Hi(b);this.a = c;if (null == c || "manifest" != c.a) return Promise.reject(new A(2, 1, 9004, c));var d = new gi();return bh([d], function () {
        return r(function f() {
          var b, h, k, l;return v(f, function (f) {
            switch (f.l) {case 1:
                return u(f, d.init(), 2);case 2:
                return u(f, ki(d, c.ja(), c.U()), 3);case 3:
                return b = f.A, u(f, b.getManifests([c.key()]), 4);case 4:
                return h = f.A, k = h[0], l = new Ii(c.ja(), c.U()), f["return"](Ji(l, k));}
          });
        });
      });
    };n.stop = function () {
      return Promise.resolve();
    };
    n.update = function () {};n.onExpirationUpdated = function (b, c) {
      var d = this.a,
          e = new gi();return bh([e], function () {
        return r(function g() {
          var h, k, l, m, p;return v(g, function (g) {
            switch (g.l) {case 1:
                return u(g, e.init(), 2);case 2:
                return u(g, ki(e, d.ja(), d.U()), 3);case 3:
                return h = g.A, u(g, h.getManifests([d.key()]), 4);case 4:
                k = g.A;l = k[0];m = l.sessionIds.includes(b);p = void 0 == l.expiration || l.expiration > c;if (m && p) return u(g, h.updateManifestExpiration(d.key(), c), 0);g.D(0);}
          });
        });
      })["catch"](function () {});
    };
    gf["application/x-offline-manifest"] = Pi;function Qi(b) {
      var c = Hi(b);return c && "manifest" == c.a ? Qi.a(b) : c && "segment" == c.a ? Qi.b(c.key(), c) : fb(new A(2, 1, 9004, b));
    }y("shaka.offline.OfflineScheme", Qi);Qi.a = function (b) {
      b = { uri: b, data: new ArrayBuffer(0), headers: { "content-type": "application/x-offline-manifest" } };return hb(b);
    };
    Qi.b = function (b, c) {
      var d = new gi(),
          e = bh([d], function () {
        return r(function g() {
          var b, e, l;return v(g, function (g) {
            switch (g.l) {case 1:
                return u(g, d.init(), 2);case 2:
                return u(g, ki(d, c.ja(), c.U()), 3);case 3:
                return b = g.A, u(g, b.getSegments([c.key()]), 4);case 4:
                return e = g.A, l = e[0], g["return"]({ uri: c, data: l.data, headers: {} });}
          });
        });
      });return ib(e);
    };wb("offline", Qi);function Ri() {}
    function Si(b, c, d) {
      return r(function f() {
        var g, h, k, l, m, p, t;return v(f, function (f) {
          switch (f.l) {case 1:
              g = Ri;h = [];for (var x = [], B = q(d), w = B.next(); !w.done; w = B.next()) {
                w = w.value;for (var Q = !1, O = q(x), V = O.next(); !V.done; V = O.next()) {
                  if (V = V.value, Ti(V.info, w)) {
                    V.sessionIds.push(w.sessionId);Q = !0;break;
                  }
                }Q || x.push({ info: w, sessionIds: [w.sessionId] });
              }k = q(x);l = k.next();case 2:
              if (l.done) {
                f.D(4);break;
              }m = l.value;p = g.a(b, c, m);return u(f, p, 5);case 5:
              t = f.A;h = h.concat(t);l = k.next();f.D(2);break;case 4:
              return f["return"](h);}
        });
      });
    }
    function Ti(b, c) {
      function d(b, c) {
        return b.robustness == c.robustness && b.contentType == c.contentType;
      }return b.keySystem == c.keySystem && b.licenseUri == c.licenseUri && sb(b.audioCapabilities, c.audioCapabilities, d) && sb(b.videoCapabilities, c.videoCapabilities, d);
    };function Ui(b) {
      this.a = null;for (var c = 0; c < b.textTracks.length; ++c) {
        var d = b.textTracks[c];d.mode = "disabled";"Shaka Player TextTrack" == d.label && (this.a = d);
      }this.a || (this.a = b.addTextTrack("subtitles", "Shaka Player TextTrack"));this.a.mode = "hidden";
    }y("shaka.text.SimpleTextDisplayer", Ui);Ui.prototype.remove = function (b, c) {
      if (!this.a) return !1;Vi(this.a, function (d) {
        return d.startTime < c && d.endTime > b;
      });return !0;
    };Ui.prototype.remove = Ui.prototype.remove;
    Ui.prototype.append = function (b) {
      for (var c = Wi, d = [], e = 0; e < b.length; e++) {
        var f = c(b[e]);f && d.push(f);
      }d.slice().sort(function (b, c) {
        return b.startTime != c.startTime ? b.startTime - c.startTime : b.endTime != c.endTime ? b.endTime - c.startTime : d.indexOf(c) - d.indexOf(b);
      }).forEach(function (b) {
        this.a.addCue(b);
      }.bind(this));
    };Ui.prototype.append = Ui.prototype.append;Ui.prototype.destroy = function () {
      this.a && Vi(this.a, function () {
        return !0;
      });this.a = null;return Promise.resolve();
    };Ui.prototype.destroy = Ui.prototype.destroy;
    Ui.prototype.isTextVisible = function () {
      return "showing" == this.a.mode;
    };Ui.prototype.isTextVisible = Ui.prototype.isTextVisible;Ui.prototype.setTextVisibility = function (b) {
      this.a.mode = b ? "showing" : "hidden";
    };Ui.prototype.setTextVisibility = Ui.prototype.setTextVisibility;
    function Wi(b) {
      if (b.startTime >= b.endTime) return null;var c = new VTTCue(b.startTime, b.endTime, b.payload);c.lineAlign = b.lineAlign;c.positionAlign = b.positionAlign;c.size = b.size;try {
        c.align = b.textAlign;
      } catch (d) {}"center" == b.textAlign && "center" != c.align && (c.align = "middle");2 == b.writingDirection ? c.vertical = "lr" : 3 == b.writingDirection && (c.vertical = "rl");1 == b.lineInterpretation && (c.snapToLines = !1);null != b.line && (c.line = b.line);null != b.position && (c.position = b.position);return c;
    }
    function Vi(b, c) {
      var d = b.mode;b.mode = "showing" == d ? "showing" : "hidden";for (var e = b.cues, f = e.length - 1; 0 <= f; f--) {
        var g = e[f];g && c(g) && b.removeCue(g);
      }b.mode = d;
    };function Xi(b, c, d, e, f) {
      var g = f in e,
          h = !0,
          k;for (k in c) {
        var l = f + "." + k,
            m = g ? e[f] : d[k];g || k in d ? void 0 === c[k] ? void 0 === m || g ? delete b[k] : b[k] = mb(m) : m.constructor == Object && c[k] && c[k].constructor == Object ? (b[k] || (b[k] = mb(m)), l = Xi(b[k], c[k], m, e, l), h = h && l) : _typeof(c[k]) != (typeof m === "undefined" ? "undefined" : _typeof(m)) || null == c[k] || c[k].constructor != m.constructor ? h = !1 : b[k] = c[k] : h = !1;
      }return h;
    }y("shaka.util.ConfigUtils.mergeConfigObjects", Xi);function Yi() {
      var b = 5E5,
          c = Infinity;navigator.connection && navigator.connection.type && (b = 1E6 * navigator.connection.downlink, navigator.connection.saveData && (c = 360));var d = { trackSelectionCallback: function trackSelectionCallback(b) {
          return b;
        }, progressCallback: function progressCallback() {}, usePersistentLicense: !0 },
          e = { drm: { retryParameters: db(), servers: {}, clearKeys: {}, advanced: {}, delayLicenseRequestUntilPlayed: !1 }, manifest: { retryParameters: db(), availabilityWindowOverride: NaN, dash: { customScheme: function customScheme(b) {
              if (b) return null;
            }, clockSyncUri: "", ignoreDrmInfo: !1,
            xlinkFailGracefully: !1, defaultPresentationDelay: 10, ignoreMinBufferTime: !1 } }, streaming: { retryParameters: db(), failureCallback: function failureCallback() {}, rebufferingGoal: 2, bufferingGoal: 10, bufferBehind: 30, ignoreTextStreamFailures: !1, alwaysStreamText: !1, startAtSegmentBoundary: !1, smallGapLimit: .5, jumpLargeGaps: !1, durationBackoff: 1, forceTransmuxTS: !1 }, offline: d, abrFactory: K, abr: { enabled: !0, defaultBandwidthEstimate: b, switchInterval: 8, bandwidthUpgradeTarget: .85, bandwidthDowngradeTarget: .95, restrictions: { minWidth: 0, maxWidth: Infinity,
            minHeight: 0, maxHeight: c, minPixels: 0, maxPixels: Infinity, minBandwidth: 0, maxBandwidth: Infinity } }, preferredAudioLanguage: "", preferredTextLanguage: "", preferredVariantRole: "", preferredTextRole: "", preferredAudioChannelCount: 2, restrictions: { minWidth: 0, maxWidth: Infinity, minHeight: 0, maxHeight: Infinity, minPixels: 0, maxPixels: Infinity, minBandwidth: 0, maxBandwidth: Infinity }, playRangeStart: 0, playRangeEnd: Infinity, textDisplayFactory: function textDisplayFactory() {
          return null;
        } };d.trackSelectionCallback = function (b) {
        return Zi(b, e.preferredAudioLanguage);
      };
      return e;
    }function $i(b, c, d) {
      return Xi(b, c, d || Yi(), { ".drm.servers": "", ".drm.clearKeys": "", ".drm.advanced": { distinctiveIdentifierRequired: !1, persistentStateRequired: !1, videoRobustness: "", audioRobustness: "", serverCertificate: new Uint8Array(0), individualizationServer: "" } }, "");
    }
    function Zi(b, c) {
      var d = b.filter(function (b) {
        return "variant" == b.type;
      }),
          e = [],
          f = Jd(c, d.map(function (b) {
        return b.language;
      }));f && (e = d.filter(function (b) {
        return I(b.language) == f;
      }));0 == e.length && (e = d.filter(function (b) {
        return b.primary;
      }));0 == e.length && (d.map(function (b) {
        return b.language;
      }), e = d);var g = e.filter(function (b) {
        return b.height && 480 >= b.height;
      });g.length && (g.sort(function (b, c) {
        return c.height - b.height;
      }), e = g.filter(function (b) {
        return b.height == g[0].height;
      }));d = [];if (e.length) {
        var h = Math.floor(e.length / 2);e.sort(function (b, c) {
          return b.bandwidth - c.bandwidth;
        });d.push(e[h]);
      }e = q(b);for (h = e.next(); !h.done; h = e.next()) {
        h = h.value, "text" == h.type && d.push(h);
      }return d;
    };function X(b, c) {
      var d = this;E.call(this);this.f = null;this.eb = !1;this.v = null;this.s = new Cb();this.Wb = this.h = this.bb = this.b = this.o = this.a = this.B = this.g = this.j = this.i = this.M = null;this.Lc = 1E9;this.Yb = [];this.Bb = !1;this.Na = !0;this.X = this.Cb = this.ma = null;this.Kc = !1;this.Jc = 0;this.P = null;this.Ab = [];this.u = new Fg();this.c = aj(this);this.zb = { width: Infinity, height: Infinity };this.m = bj();this.yb = 0;this.wb = new Ng(this.c.preferredAudioLanguage, this.c.preferredVariantRole, this.c.preferredAudioChannelCount);this.ha = this.c.preferredTextLanguage;
      this.cb = this.c.preferredTextRole;c && c(this);this.M = cj(this);b && this.Db(b, !0);this.J = new ah(function () {
        return r(function f() {
          var b;return v(f, function (c) {
            switch (c.l) {case 1:
                return b = Promise.all([d.s ? d.s.destroy() : null, d.M ? d.M.destroy() : null]), d.eb = !1, d.s = null, d.h = null, d.Wb = null, d.M = null, d.c = null, u(c, b, 0);}
          });
        });
      });G(this.s, window, "online", function () {
        d.Ac();
      });
    }Fa(X, E);y("shaka.Player", X);
    function dj(b) {
      if (!b.ma) return Promise.resolve();var c = Promise.resolve();b.o && (c = b.o.stop(), b.o = null);return Promise.all([c, b.ma()]);
    }X.prototype.destroy = function () {
      var b = this;return r(function d() {
        return v(d, function (d) {
          switch (d.l) {case 1:
              return u(d, b.detach(), 2);case 2:
              return u(d, b.J.destroy(), 0);}
        });
      });
    };X.prototype.destroy = X.prototype.destroy;X.version = "v2.5.0-beta2-master-uncompiled";var ej = ["output-restricted", "internal-error"],
        fj = {};X.registerSupportPlugin = function (b, c) {
      fj[b] = c;
    };
    X.isBrowserSupported = function () {
      return !!window.Promise && !!window.Uint8Array && !!Array.prototype.forEach && !!window.MediaSource && !!MediaSource.isTypeSupported && !!window.MediaKeys && !!window.navigator && !!window.navigator.requestMediaKeySystemAccess && !!window.MediaKeySystemAccess && !!window.MediaKeySystemAccess.prototype.getConfiguration;
    };X.probeSupport = function () {
      return Cc().then(function (b) {
        var c = jf(),
            d = td();b = { manifest: c, media: d, drm: b };for (var e in fj) {
          b[e] = fj[e]();
        }return b;
      });
    };
    X.prototype.Db = function (b, c) {
      var d = this;return r(function f() {
        return v(f, function (f) {
          switch (f.l) {case 1:
              void 0 === c && (c = !0);if (!d.f) {
                f.D(2);break;
              }return u(f, d.detach(), 2);case 2:
              d.f = b;G(d.s, d.f, "error", d.We.bind(d));if (c) return d.j = new rd(d.f), u(f, d.j.m, 0);f.D(0);}
        });
      });
    };X.prototype.attach = X.prototype.Db;X.prototype.detach = function () {
      var b = this;return r(function d() {
        return v(d, function (d) {
          switch (d.l) {case 1:
              return b.f ? u(d, b.vb(!1), 2) : d["return"]();case 2:
              b.s.ua(b.f, "error"), b.f = null, d.l = 0;}
        });
      });
    };
    X.prototype.detach = X.prototype.detach;function gj(b, c, d) {
      return r(function f() {
        var g;return v(f, function (f) {
          switch (f.l) {case 1:
              return u(f, kf(c, b.M, b.c.manifest.retryParameters, d), 2);case 2:
              return g = f.A, f["return"](new g());}
        });
      });
    }function hj(b) {
      return b.o.start(b.bb, { networkingEngine: b.M, filterNewPeriod: b.bc.bind(b), filterAllPeriods: b.Uc.bind(b), onTimelineRegionAdded: function onTimelineRegionAdded(c) {
          b.B ? fh(b.B, c) : b.Ab.push(c);
        }, onEvent: b.ub.bind(b), onError: b.Ka.bind(b) });
    }
    function ij(b) {
      function c(b) {
        return b.video && b.audio || b.video && b.video.codecs.includes(",");
      }b.b.periods.some(function (b) {
        return b.variants.some(c);
      }) && b.b.periods.forEach(function (b) {
        b.variants = b.variants.filter(c);
      });if (0 == b.b.periods.length) throw new A(2, 4, 4014);
    }
    X.prototype.load = function (b, c, d) {
      c = void 0 === c ? null : c;var e = this;return r(function g() {
        var h, k, l, m, p, t, w, x, B, R, Q, O, V, oa, va, Y, Rb, Sb;return v(g, function (g) {
          switch (g.l) {case 1:
              if (!e.f) throw new A(2, 7, 7002);k = new z();l = function l() {
                h = new A(2, 7, 7E3);return k;
              };e.dispatchEvent(new D("loading"));m = Date.now();na(g, 2);p = e.f;t = e.vb();e.ma = l;return u(g, t, 4);case 4:
              e.m = bj();G(e.s, p, "playing", function () {
                return jj(e);
              });G(e.s, p, "pause", function () {
                return jj(e);
              });G(e.s, p, "ended", function () {
                return jj(e);
              });w = e.c.abrFactory;
              e.h && e.Wb == w || (e.Wb = w, e.h = new w(), e.h.configure(e.c.abr));x = e.c.textDisplayFactory;e.v = new x();e.v.setTextVisibility(e.eb);if (h) throw h;R = B = null;d && ("string" == typeof d ? R = d : (Ka("Loading with a manifest parser factory is deprecated. Instead please register a manifest parser and pass in the mime type."), B = d));Q = e;if (B) {
                O = new B();g.D(5);break;
              }return u(g, gj(e, b, R), 6);case 6:
              O = g.A;case 5:
              return Q.o = O, e.o.configure(e.c.manifest), e.bb = b, u(g, hj(e), 7);case 7:
              V = g.A;e.b = V;if (h) throw h;ij(e);oa = e;return u(g, kj(e, V), 8);case 8:
              oa.i = g.A;if (h) throw h;e.Uc(e.b.periods);lj(e, e.b.periods);e.yb = Date.now() / 1E3;e.wb = new Ng(e.c.preferredAudioLanguage, e.c.preferredVariantRole, e.c.preferredAudioChannelCount);e.ha = e.c.preferredTextLanguage;mj(e.b.presentationTimeline, e.c.playRangeStart, e.c.playRangeEnd, e.W());return u(g, e.i.Db(p), 9);case 9:
              if (h) throw h;e.h.init(function (b, c, d) {
                c = void 0 === c ? !1 : c;d = void 0 === d ? 0 : d;nj(e, b, !0);e.a && (xh(e.a, b, c, d), oj(e));
              });e.j || (e.j = new rd(e.f));e.j.u = e.v;e.g = new Wg(e.f, e.b.presentationTimeline, e.b.minBufferTime || 0, e.c.streaming, c, e.Df.bind(e), e.ub.bind(e));e.B = new ch(e.f, e.b.minBufferTime, e.c.streaming, e.Ed.bind(e), e.ub.bind(e), e.Cf.bind(e), new hh(e.f, e.j, e.b));e.a = new ih(e.b, { Ia: e.g, K: e.j, Ob: e.M, gd: e.Fe.bind(e), fd: e.Wd.bind(e), onError: e.Ka.bind(e), onEvent: e.ub.bind(e), Je: e.Ke.bind(e), nb: e.Te.bind(e) });e.a.configure(e.c.streaming);pj(e);e.dispatchEvent(new D("streaming"));return u(g, e.a.init(), 10);case 10:
              if (h) throw h;e.c.streaming.startAtSegmentBoundary && (va = qj(e, Zg(e.g)), Tg(e.g.b, va));
              e.b.periods.forEach(e.bc.bind(e));rj(e);oj(e);Y = lh(e.a);Y.variants.some(function (b) {
                return b.primary;
              });sj(e, Y.variants);for (var Tb = q(e.Ab), qb = Tb.next(); !qb.done; qb = Tb.next()) {
                Rb = qb.value, fh(e.B, Rb);
              }e.Ab = [];Fb(e.s, p, "loadeddata", function () {
                e.m.loadLatency = (Date.now() - m) / 1E3;
              });if (h) throw h;e.ma = null;qa(g, 0);break;case 2:
              return Sb = ra(g), k.resolve(), e.ma == l && (e.ma = null, e.dispatchEvent(new D("unloading"))), h ? g["return"](Promise.reject(h)) : g["return"](Promise.reject(Sb));}
        });
      });
    };X.prototype.load = X.prototype.load;
    function pj(b) {
      function c(b) {
        var c = "";b.video && (c = Nb(b.video.codecs)[0]);var d = "";b.audio && (d = Nb(b.audio.codecs)[0]);return c + "-" + d;
      }var d = b.b.periods.reduce(function (b, c) {
        return b.concat(c.variants);
      }, []);d = J.Wc(d, b.c.preferredAudioChannelCount);var e = new lb();d.forEach(function (b) {
        var d = c(b);e.push(d, b);
      });var f = null,
          g = Infinity;e.forEach(function (b, c) {
        var d = 0,
            e = 0;c.forEach(function (b) {
          d += b.bandwidth || 0;++e;
        });var h = d / e;h < g && (f = b, g = h);
      });b.b.periods.forEach(function (b) {
        b.variants = b.variants.filter(function (b) {
          return c(b) == f ? !0 : !1;
        });
      });
    }function kj(b, c) {
      return r(function e() {
        var f, g, h;return v(e, function (e) {
          switch (e.l) {case 1:
              return f = { Ob: b.M, onError: function onError(c) {
                  b.Ka(c);
                }, ld: function ld(c) {
                  tj(b, c);
                }, onExpirationUpdated: function onExpirationUpdated(c, e) {
                  if (b.o && b.o.onExpirationUpdated) b.o.onExpirationUpdated(c, e);b.dispatchEvent(new D("expirationupdated"));
                }, onEvent: function onEvent(c) {
                  b.ub(c);
                } }, g = new dc(f), g.configure(b.c.drm), h = J.Yc(c), u(e, kc(g, h, c.offlineSessionIds), 2);case 2:
              return e["return"](g);}
        });
      });
    }
    function cj(b) {
      return new F(function (c, d) {
        b.h && b.h.segmentDownloaded(c, d);
      });
    }X.prototype.configure = function (b, c) {
      if (2 == arguments.length && "string" == typeof b) {
        for (var d = b, e = {}, f = e, g = 0, h = 0;;) {
          g = d.indexOf(".", g);if (0 > g) break;if (0 == g || "\\" != d[g - 1]) h = d.substring(h, g).replace(/\\\./g, "."), f[h] = {}, f = f[h], h = g + 1;g += 1;
        }f[d.substring(h).replace(/\\\./g, ".")] = c;b = e;
      }d = $i(this.c, b, aj(this));uj(this);return d;
    };X.prototype.configure = X.prototype.configure;
    function uj(b) {
      b.o && b.o.configure(b.c.manifest);b.i && b.i.configure(b.c.drm);if (b.a) {
        b.a.configure(b.c.streaming);try {
          b.b.periods.forEach(b.bc.bind(b));
        } catch (f) {
          b.Ka(f);
        }var c = nh(b.a),
            d = ph(b.a),
            e = lh(b.a);c = J.hc(c, d, e.variants);b.h && c && c.allowedByApplication && c.allowedByKeySystem ? sj(b, e.variants) : vj(b, e);
      }b.h && (b.h.configure(b.c.abr), b.c.abr.enabled && !b.Na ? b.h.enable() : b.h.disable());
    }X.prototype.getConfiguration = function () {
      var b = aj(this);$i(b, this.c, aj(this));return b;
    };X.prototype.getConfiguration = X.prototype.getConfiguration;
    X.prototype.qf = function () {
      for (var b in this.c) {
        delete this.c[b];
      }$i(this.c, aj(this), aj(this));uj(this);
    };X.prototype.resetConfiguration = X.prototype.qf;X.prototype.oe = function () {
      return this.f;
    };X.prototype.getMediaElement = X.prototype.oe;X.prototype.gb = function () {
      return this.M;
    };X.prototype.getNetworkingEngine = X.prototype.gb;X.prototype.cc = function () {
      return this.bb;
    };X.prototype.getAssetUri = X.prototype.cc;
    X.prototype.ne = function () {
      Ka('"getManifestUri" is deprecated and will be removed in v2.6. Please use "getAssetUri" instead.');return this.bb;
    };X.prototype.getManifestUri = X.prototype.ne;X.prototype.W = function () {
      return this.b ? this.b.presentationTimeline.W() : !1;
    };X.prototype.isLive = X.prototype.W;X.prototype.Fa = function () {
      return this.b ? this.b.presentationTimeline.Fa() : !1;
    };X.prototype.isInProgress = X.prototype.Fa;
    X.prototype.Be = function () {
      if (!this.b || !this.b.periods.length) return !1;var b = this.b.periods[0].variants;return b.length ? !b[0].video : !1;
    };X.prototype.isAudioOnly = X.prototype.Be;X.prototype.sf = function () {
      var b = 0,
          c = 0;this.b && (c = this.b.presentationTimeline, b = c.Qa(), c = c.qa());return { start: b, end: c };
    };X.prototype.seekRange = X.prototype.sf;X.prototype.keySystem = function () {
      return this.i ? this.i.keySystem() : "";
    };X.prototype.keySystem = X.prototype.keySystem;X.prototype.drmInfo = function () {
      return this.i ? this.i.a : null;
    };
    X.prototype.drmInfo = X.prototype.drmInfo;X.prototype.Lb = function () {
      return this.i ? this.i.Lb() : Infinity;
    };X.prototype.getExpiration = X.prototype.Lb;X.prototype.dd = function () {
      return this.Bb;
    };X.prototype.isBuffering = X.prototype.dd;
    X.prototype.vb = function (b) {
      var c = this;return r(function e() {
        return v(e, function (e) {
          switch (e.l) {case 1:
              if (c.J.a) return e["return"]();void 0 === b && (b = !0);c.dispatchEvent(new D("unloading"));return u(e, dj(c), 2);case 2:
              return c.Cb || (c.Cb = wj(c).then(function () {
                c.Ed(!1);c.Cb = null;
              })), u(e, c.Cb, 3);case 3:
              if (b) return c.j = new rd(c.f), u(e, c.j.m, 0);e.D(0);}
        });
      });
    };X.prototype.unload = X.prototype.vb;X.prototype.hb = function () {
      return this.g ? this.g.hb() : 0;
    };X.prototype.getPlaybackRate = X.prototype.hb;
    X.prototype.Mf = function (b) {
      this.g && Vg(this.g.b, b);this.a && vh(this.a, 1 != b);
    };X.prototype.trickPlay = X.prototype.Mf;X.prototype.Xd = function () {
      this.g && Vg(this.g.b, 1);this.a && vh(this.a, !1);
    };X.prototype.cancelTrickPlay = X.prototype.Xd;X.prototype.Ta = function () {
      if (!this.b || !this.g) return [];var b = J.pa(this.b, Zg(this.g));return J.Ta(this.b.periods[b], this.u.get(b, "audio"), this.u.get(b, "video"));
    };X.prototype.getVariantTracks = X.prototype.Ta;
    X.prototype.Sa = function () {
      if (!this.b || !this.g) return [];var b = J.pa(this.b, Zg(this.g));if (!this.u.get(b, "text")) {
        var c = J.Hb(this.b.periods[b].textStreams, this.ha, this.cb);c.length && Gg(this.u, b, "text", c[0].id);
      }return J.Sa(this.b.periods[b], this.u.get(b, "text")).filter(function (b) {
        return !this.Yb.includes(b.id);
      }.bind(this));
    };X.prototype.getTextTracks = X.prototype.Sa;X.prototype.wf = function (b) {
      if (this.a) {
        var c = lh(this.a);if (b = J.ee(c, b)) this.j.o = !1, xj(this, b, !1), yj(this, b), this.ha = b.language;
      }
    };
    X.prototype.selectTextTrack = X.prototype.wf;X.prototype.uf = function () {
      this.j.o = !0;uh(this.a);
    };X.prototype.selectEmbeddedTextTrack = X.prototype.uf;X.prototype.Rf = function () {
      return this.j ? this.j.o : !1;
    };X.prototype.usingEmbeddedTextTrack = X.prototype.Rf;
    X.prototype.xf = function (b, c, d) {
      d = void 0 === d ? 0 : d;if (this.a) {
        this.c.abr.enabled && Ka("Changing tracks while abr manager is enabled will likely result in the selected track being overriden. Consider disabling abr before calling selectVariantTrack().");var e = lh(this.a);(b = J.fe(e, b)) && J.mb(b) && (nj(this, b, !1), zj(this, b, c, d), this.wb = new Mg(b), sj(this, e.variants));
      }
    };X.prototype.selectVariantTrack = X.prototype.xf;X.prototype.ie = function () {
      return Aj(this.Ta());
    };X.prototype.getAudioLanguagesAndRoles = X.prototype.ie;
    X.prototype.ue = function () {
      return Aj(this.Sa());
    };X.prototype.getTextLanguagesAndRoles = X.prototype.ue;X.prototype.he = function () {
      var b = this.Ta();return Array.from(Bj(b));
    };X.prototype.getAudioLanguages = X.prototype.he;X.prototype.te = function () {
      var b = this.Sa();return Array.from(Bj(b));
    };X.prototype.getTextLanguages = X.prototype.te;X.prototype.tf = function (b, c) {
      if (this.a) {
        this.wb = new Ng(b, c || "", 0);var d = lh(this.a);vj(this, d);
      }
    };X.prototype.selectAudioLanguage = X.prototype.tf;
    X.prototype.vf = function (b, c) {
      if (this.a) {
        var d = lh(this.a);this.ha = b;this.cb = c || "";vj(this, d);
      }
    };X.prototype.selectTextLanguage = X.prototype.vf;X.prototype.kc = function () {
      return this.v ? this.v.isTextVisible() : this.eb;
    };X.prototype.isTextTrackVisible = X.prototype.kc;
    X.prototype.Cd = function (b) {
      var c = this;return r(function e() {
        var f, g, h, k;return v(e, function (e) {
          switch (e.l) {case 1:
              if (b == c.eb) return e["return"]();c.v && c.v.setTextVisibility(b);c.eb = b;Dj(c);if (c.c.streaming.alwaysStreamText || !c.a) return e["return"]();f = J;if (b) {
                if (g = lh(c.a), h = f.Hb(g.textStreams, c.ha, c.cb), k = h[0]) return u(e, qh(c.a, k), 0);
              } else uh(c.a);e.D(0);}
        });
      });
    };X.prototype.setTextTrackVisibility = X.prototype.Cd;
    X.prototype.qe = function () {
      return this.b ? new Date(1E3 * this.b.presentationTimeline.f + 1E3 * this.f.currentTime) : null;
    };X.prototype.getPlayheadTimeAsDate = X.prototype.qe;X.prototype.se = function () {
      return this.b ? new Date(1E3 * this.b.presentationTimeline.f) : null;
    };X.prototype.getPresentationStartTimeAsDate = X.prototype.se;X.prototype.dc = function () {
      return this.j ? this.j.dc() : { total: [], audio: [], video: [], text: [] };
    };X.prototype.getBufferedInfo = X.prototype.dc;
    X.prototype.getStats = function () {
      Ej(this);jj(this);var b = null,
          c = null,
          d = this.f;d = d && d.getVideoPlaybackQuality ? d.getVideoPlaybackQuality() : {};if (this.g && this.b) {
        var e = J.pa(this.b, Zg(this.g)),
            f = this.b.periods[e];null != this.u.a[e] && (c = J.ve(this.u.get(e, "audio"), this.u.get(e, "video"), f.variants), b = c.video || {});
      }b || (b = {});c || (c = {});return { width: b.width || 0, height: b.height || 0, streamBandwidth: c.bandwidth || 0, decodedFrames: Number(d.totalVideoFrames), droppedFrames: Number(d.droppedVideoFrames), estimatedBandwidth: this.h ? this.h.getBandwidthEstimate() : NaN, loadLatency: this.m.loadLatency, playTime: this.m.playTime, bufferingTime: this.m.bufferingTime, switchHistory: mb(this.m.switchHistory), stateHistory: mb(this.m.stateHistory) };
    };X.prototype.getStats = X.prototype.getStats;
    X.prototype.addTextTrack = function (b, c, d, e, f, g) {
      if (!this.a) return Promise.reject();var h = lh(this.a),
          k = this.b.periods.indexOf(h) + 1,
          l = (k >= this.b.periods.length ? this.b.presentationTimeline.S() : this.b.periods[k].startTime) - h.startTime;if (Infinity == l) return Promise.reject(new A(1, 4, 4033));var m = { id: this.Lc++, originalId: null, createSegmentIndex: Promise.resolve.bind(Promise), findSegmentPosition: function findSegmentPosition() {
          return 1;
        }, getSegmentReference: function getSegmentReference(c) {
          return 1 != c ? null : new N(1, 0, l, function () {
            return [b];
          }, 0, null);
        },
        initSegmentReference: null, presentationTimeOffset: 0, mimeType: e, codecs: f || "", kind: d, encrypted: !1, keyId: null, language: c, label: g || null, type: "text", primary: !1, trickModeVideo: null, emsgSchemeIdUris: null, roles: [], channelsCount: null, closedCaptions: null };this.Yb.push(m.id);h.textStreams.push(m);return qh(this.a, m).then(function () {
        if (!this.J.a) {
          var b = this.b.periods.indexOf(h),
              e = oh(this.a, "text");e && Gg(this.u, b, "text", e.id);ob(this.Yb, m.id);vj(this, h);rj(this);return { id: m.id, active: !1, type: "text", bandwidth: 0,
            language: c, label: g || null, kind: d, width: null, height: null };
        }
      }.bind(this));
    };X.prototype.addTextTrack = X.prototype.addTextTrack;X.prototype.Cc = function (b, c) {
      this.zb.width = b;this.zb.height = c;
    };X.prototype.setMaxHardwareResolution = X.prototype.Cc;X.prototype.Ac = function () {
      if (this.a) {
        var b = this.a;if (b.f) b = !1;else if (b.m) b = !1;else {
          for (var c = q(b.c.values()), d = c.next(); !d.done; d = c.next()) {
            d = d.value, d.kb && (d.kb = !1, th(b, d, .1));
          }b = !0;
        }
      } else b = !1;return b;
    };X.prototype.retryStreaming = X.prototype.Ac;X.prototype.me = function () {
      return this.b;
    };
    X.prototype.getManifest = X.prototype.me;function nj(b, c, d) {
      c.video && Fj(b, c.video);c.audio && Fj(b, c.audio);var e = mh(b.a);e = J.hc(nh(b.a), ph(b.a), e ? e.variants : []);c != e && b.m.switchHistory.push({ timestamp: Date.now() / 1E3, id: c.id, type: "variant", fromAdaptation: d, bandwidth: c.bandwidth });
    }function xj(b, c, d) {
      Fj(b, c);b.m.switchHistory.push({ timestamp: Date.now() / 1E3, id: c.id, type: "text", fromAdaptation: d, bandwidth: null });
    }function Fj(b, c) {
      Gg(b.u, J.oa(b.b, c), c.type, c.id);
    }
    function wj(b) {
      b.s && (b.s.ua(b.f, "loadeddata"), b.s.ua(b.f, "playing"), b.s.ua(b.f, "pause"), b.s.ua(b.f, "ended"));var c = b.i,
          d = Promise.all([b.h ? b.h.stop() : null, b.j ? b.j.destroy() : null, b.g ? b.g.destroy() : null, b.B ? b.B.destroy() : null, b.a ? b.a.destroy() : null, b.o ? b.o.stop() : null, b.v ? b.v.destroy() : null]).then(function () {
        return c ? c.destroy() : null;
      });b.Na = !0;b.i = null;b.j = null;b.g = null;b.B = null;b.a = null;b.o = null;b.v = null;b.b = null;b.bb = null;b.Ab = [];b.u = new Fg();b.m = bj();return d;
    }
    function aj(b) {
      var c = Yi();c.streaming.failureCallback = function (c) {
        var d = [1001, 1002, 1003];b.W() && d.includes(c.code) && (c.severity = 1, b.Ac());
      };c.textDisplayFactory = function () {
        return new Ui(b.f);
      };return c;
    }function bj() {
      return { width: NaN, height: NaN, streamBandwidth: NaN, decodedFrames: NaN, droppedFrames: NaN, estimatedBandwidth: NaN, loadLatency: NaN, playTime: 0, bufferingTime: 0, switchHistory: [], stateHistory: [] };
    }
    function lj(b, c) {
      for (var d = 0; d < c.length; d++) {
        for (var e = c[d], f = new Map(), g = q(e.variants), h = g.next(); !h.done; h = g.next()) {
          if (h = h.value, h.video && h.video.closedCaptions) {
            h = h.video;for (var k = q(h.closedCaptions.keys()), l = k.next(); !l.done; l = k.next()) {
              if (l = l.value, !f.has(l)) {
                var m = { id: b.Lc++, originalId: l, createSegmentIndex: Promise.resolve.bind(Promise), findSegmentPosition: function findSegmentPosition() {
                    return null;
                  }, getSegmentReference: function getSegmentReference() {
                    return null;
                  }, initSegmentReference: null, presentationTimeOffset: 0, mimeType: "application/cea-608",
                  codecs: "", kind: "caption", encrypted: !1, keyId: null, language: h.closedCaptions.get(l), label: null, type: "text", primary: !1, trickModeVideo: null, emsgSchemeIdUris: null, roles: h.roles, channelsCount: null, closedCaptions: {} };f.set(l, m);
              }
            }
          }
        }f = q(f.values());for (g = f.next(); !g.done; g = f.next()) {
          e.textStreams.push(g.value);
        }
      }
    }n = X.prototype;
    n.Uc = function (b) {
      var c = this.a ? nh(this.a) : null,
          d = this.a ? ph(this.a) : null;b.forEach(J.filterNewPeriod.bind(null, this.i, c, d));c = pb(b, function (b) {
        return b.variants.some(J.mb);
      });if (0 == c) throw new A(2, 4, 4032);if (c < b.length) throw new A(2, 4, 4011);b.forEach(function (b) {
        J.Nc(b.variants, this.c.restrictions, this.zb) && this.a && lh(this.a) == b && rj(this);Gj(this, b.variants);
      }.bind(this));
    };
    n.bc = function (b) {
      var c = this.a ? nh(this.a) : null,
          d = this.a ? ph(this.a) : null;J.filterNewPeriod(this.i, c, d, b);c = b.variants;if (!c.some(J.mb)) throw new A(2, 4, 4011);Gj(this, b.variants);J.Nc(c, this.c.restrictions, this.zb) && this.a && lh(this.a) == b && rj(this);if (b = this.i ? this.i.a : null) for (c = q(c), d = c.next(); !d.done; d = c.next()) {
        d = q(d.value.drmInfos);for (var e = d.next(); !e.done; e = d.next()) {
          if (e = e.value, e.keySystem == b.keySystem) {
            e = q(e.initData || []);for (var f = e.next(); !f.done; f = e.next()) {
              f = f.value, tc(this.i, f.initDataType, f.initData);
            }
          }
        }
      }
    };function zj(b, c, d, e) {
      d = void 0 === d ? !1 : d;e = void 0 === e ? 0 : e;b.Na ? (b.X = c, b.Kc = d, b.Jc = e) : (xh(b.a, c, d, e), Hj(b));
    }function yj(b, c) {
      b.Na ? b.P = c : (wh(b.a, c, !0, 0), Ij(b));
    }function Ej(b) {
      if (b.b) {
        var c = Date.now() / 1E3;b.Bb ? b.m.bufferingTime += c - b.yb : b.m.playTime += c - b.yb;b.yb = c;
      }
    }
    function qj(b, c) {
      function d(b, c) {
        if (!b) return null;var d = b.findSegmentPosition(c - g.startTime);return null == d ? null : (d = b.getSegmentReference(d)) ? d.startTime + g.startTime : null;
      }var e = nh(b.a),
          f = ph(b.a),
          g = lh(b.a);e = d(e, c);f = d(f, c);return null != f && null != e ? Math.max(f, e) : null != f ? f : null != e ? e : c;
    }n.Ed = function (b) {
      Ej(this);this.Bb = b;jj(this);if (this.g) {
        var c = this.g.b;b != c.g && (c.g = b, Vg(c, c.f));
      }this.dispatchEvent(new D("buffering", { buffering: b }));
    };n.Cf = function () {
      rj(this);
    };
    function jj(b) {
      if (!b.J.a) {
        var c = b.Bb ? "buffering" : b.f.ended ? "ended" : b.f.paused ? "paused" : "playing";var d = Date.now() / 1E3;if (b.m.stateHistory.length) {
          var e = b.m.stateHistory[b.m.stateHistory.length - 1];e.duration = d - e.timestamp;if (c == e.state) return;
        }b.m.stateHistory.push({ timestamp: d, state: c, duration: 0 });
      }
    }n.Df = function () {
      if (this.B) {
        var b = this.B;b.f.forEach(b.o.bind(b, !0));
      }this.a && Ah(this.a);
    };
    function sj(b, c) {
      try {
        Gj(b, c);
      } catch (e) {
        return b.Ka(e), null;
      }var d = c.filter(function (b) {
        return J.mb(b);
      });d = b.wb.create(d);b.h.setVariants(Array.from(d.values()));return b.h.chooseVariant();
    }function vj(b, c) {
      var d = sj(b, c.variants);d && (nj(b, d, !0), zj(b, d, !0));(d = J.Hb(c.textStreams, b.ha, b.cb)[0] || null) && (b.c.streaming.alwaysStreamText || b.kc()) && (xj(b, d, !0), yj(b, d));oj(b);
    }
    n.Fe = function (b) {
      try {
        var c = this.b;this.Na = !0;this.h.disable();var d = sj(this, b.variants),
            e = J.Hb(b.textStreams, this.ha, this.cb)[0] || null;this.X && (c.periods[J.de(c, this.X)] == b && (d = this.X), this.X = null);this.P && (c.periods[J.oa(c, this.P)] == b && (e = this.P), this.P = null);d && nj(this, d, !0);e && xj(this, e, !0);var f = !mh(this.a),
            g = d ? d.audio : null,
            h;if (h = f && g && e) {
          b = e;var k = I(this.c.preferredTextLanguage),
              l = I(g.language),
              m = I(b.language);h = Fd(m, k) && !Fd(l, k);
        }h && (this.Cd(!0), Dj(this));return this.c.streaming.alwaysStreamText || this.kc() ? { variant: d, text: e } : { variant: d, text: null };
      } catch (p) {
        return this.Ka(p), { variant: null, text: null };
      }
    };n.Wd = function () {
      this.Na = !1;this.c.abr.enabled && this.h.enable();this.X && (xh(this.a, this.X, this.Kc, this.Jc), this.X = null);this.P && (wh(this.a, this.P, !0, 0), this.P = null);
    };n.Ke = function () {
      this.o && this.o.update && this.o.update();
    };n.Te = function () {
      this.g && this.g.nb();
    };
    function oj(b) {
      r(function d() {
        var e;return v(d, function (d) {
          switch (d.l) {case 1:
              return u(d, Promise.resolve(), 2);case 2:
              if (b.J.a) return d["return"]();e = new D("adaptation");b.dispatchEvent(e);d.l = 0;}
        });
      });
    }function rj(b) {
      r(function d() {
        var e;return v(d, function (d) {
          switch (d.l) {case 1:
              return u(d, Promise.resolve(), 2);case 2:
              if (b.J.a) return d["return"]();e = new D("trackschanged");b.dispatchEvent(e);d.l = 0;}
        });
      });
    }
    function Hj(b) {
      r(function d() {
        var e;return v(d, function (d) {
          switch (d.l) {case 1:
              return u(d, Promise.resolve(), 2);case 2:
              if (b.J.a) return d["return"]();e = new D("variantchanged");b.dispatchEvent(e);d.l = 0;}
        });
      });
    }function Ij(b) {
      r(function d() {
        var e;return v(d, function (d) {
          switch (d.l) {case 1:
              return u(d, Promise.resolve(), 2);case 2:
              if (b.J.a) return d["return"]();e = new D("trackschanged");b.dispatchEvent(e);d.l = 0;}
        });
      });
    }function Dj(b) {
      b.dispatchEvent(new D("texttrackvisibility"));
    }
    n.Ka = function (b) {
      if (!this.J.a) {
        var c = new D("error", { detail: b });this.dispatchEvent(c);c.defaultPrevented && (b.handled = !0);
      }
    };n.ub = function (b) {
      this.dispatchEvent(b);
    };n.We = function () {
      if (this.f.error) {
        var b = this.f.error.code;if (1 != b) {
          var c = this.f.error.msExtendedCode;c && (0 > c && (c += Math.pow(2, 32)), c = c.toString(16));this.Ka(new A(2, 3, 3016, b, c, this.f.error.message));
        }
      }
    };
    function tj(b, c) {
      var d = lh(b.a),
          e = !1,
          f = Object.keys(c),
          g = 1 == f.length && "00" == f[0];f.length && d.variants.forEach(function (b) {
        J.we(b).forEach(function (d) {
          var f = b.allowedByKeySystem;d.keyId && (d = c[g ? "00" : d.keyId], b.allowedByKeySystem = !!d && !ej.includes(d));f != b.allowedByKeySystem && (e = !0);
        });
      });f = nh(b.a);var h = ph(b.a);(f = J.hc(f, h, d.variants)) && !f.allowedByKeySystem && vj(b, d);e && (rj(b), sj(b, d.variants));
    }function mj(b, c, d, e) {
      0 < c && (e || b.Dd(c));d < b.S() && (e || b.la(d));
    }
    function Gj(b, c) {
      var d = b.i ? Jb(b.i.X) : {},
          e = Object.keys(d);e = e.length && "00" == e[0];for (var f = !1, g = !1, h = [], k = [], l = q(c), m = l.next(); !m.done; m = l.next()) {
        m = m.value;var p = [];m.audio && p.push(m.audio);m.video && p.push(m.video);p = q(p);for (var t = p.next(); !t.done; t = p.next()) {
          if (t = t.value, t.keyId) {
            var w = d[e ? "00" : t.keyId];w ? ej.includes(w) && (k.includes(w) || k.push(w)) : h.includes(t.keyId) || h.push(t.keyId);
          }
        }m.allowedByApplication ? m.allowedByKeySystem && (f = !0) : g = !0;
      }if (!f) throw new A(2, 4, 4012, { hasAppRestrictions: g, missingKeys: h,
        restrictedKeyStatuses: k });
    }function Aj(b) {
      var c = new Map();b = q(b);for (var d = b.next(); !d.done; d = b.next()) {
        var e = d.value;d = I(e.language);var f = c.get(d) || new Set();e = q(e.roles);for (var g = e.next(); !g.done; g = e.next()) {
          f.add(g.value);
        }c.set(d, f);
      }c.forEach(function (b) {
        0 == b.size && b.add("");
      });var h = [];c.forEach(function (b, c) {
        for (var d = q(b), e = d.next(); !e.done; e = d.next()) {
          h.push({ language: c, role: e.value });
        }
      });return h;
    }
    function Bj(b) {
      var c = new Set();b = q(b);for (var d = b.next(); !d.done; d = b.next()) {
        d = I(d.value.language), c.add(d);
      }return c;
    };function Jj(b, c, d) {
      var e = void 0 == c.expiration ? Infinity : c.expiration,
          f = c.presentationTimeline.S();c = Kj(c.periods[0]);return { offlineUri: null, originalManifestUri: b, duration: f, size: 0, expiration: e, tracks: c, appMetadata: d };
    }function Lj(b, c) {
      var d = Ki(new Ii(b.ja(), b.U()), c.periods[0], new W(null, 0)),
          e = c.appMetadata || {};d = Kj(d);return { offlineUri: b.toString(), originalManifestUri: c.originalManifestUri, duration: c.duration, size: c.size, expiration: c.expiration, tracks: d, appMetadata: e };
    }
    function Kj(b) {
      var c = [],
          d = J.$c(b.variants);d = q(d);for (var e = d.next(); !e.done; e = d.next()) {
        c.push(J.Ld(e.value));
      }b = q(b.textStreams);for (d = b.next(); !d.done; d = b.next()) {
        c.push(J.Hd(d.value));
      }return c;
    };function Mj() {
      this.a = {};
    }function Nj(b, c, d) {
      d = d.endTime - d.startTime;return Oj(b, c) * d;
    }function Oj(b, c) {
      var d = b.a[c];null == d && (d = 0);return d;
    };function Pj(b, c) {
      for (var d = { width: Infinity, height: Infinity }, e = q(b.periods), f = e.next(); !f.done; f = e.next()) {
        f = f.value, f.variants = f.variants.filter(function (b) {
          return J.nc(b, c, d);
        });
      }
    }function Qj(b) {
      b = q(b.periods);for (var c = b.next(); !c.done; c = b.next()) {
        c = c.value, c.variants = c.variants.filter(function (b) {
          var c = !0;b.audio && (c = c && sd(b.audio));b.video && (c = c && sd(b.video));return c;
        });
      }
    }
    function Rj(b, c) {
      for (var d = q(b.periods), e = d.next(); !e.done; e = d.next()) {
        e = e.value, e.variants = e.variants.filter(function (b) {
          return Dc(c, b);
        });
      }
    }function Sj(b) {
      var c = new Tj();b.periods.forEach(function (b, d) {
        var e = Uj(b.variants);if (0 == d) {
          e = q(e.a);for (var f = e.next(); !f.done; f = e.next()) {
            c.add(f.value);
          }
        } else Vj(c, e);
      });b = q(b.periods);for (var d = b.next(); !d.done; d = b.next()) {
        d = d.value, d.variants = d.variants.filter(function (b) {
          return Wj(c, new Xj(b));
        });
      }
    }
    function Yj(b, c) {
      var d = new Tj();b.periods.forEach(function (b, f) {
        0 < f && (b.variants = b.variants.filter(function (b) {
          return Wj(d, new Xj(b));
        }));c(b);d = Uj(b.variants);
      });
    }function Xj(b) {
      var c = b.audio;b = b.video;this.b = c ? c.mimeType : null;this.a = c ? c.codecs.split(".")[0] : null;this.f = b ? b.mimeType : null;this.c = b ? b.codecs.split(".")[0] : null;
    }function Tj() {
      this.a = [];
    }Tj.prototype.add = function (b) {
      Wj(this, b) || this.a.push(b);
    };function Vj(b, c) {
      b.a = b.a.filter(function (b) {
        return Wj(c, b);
      });
    }
    function Wj(b, c) {
      return b.a.some(function (b) {
        return c.b == b.b && c.a == b.a && c.f == b.f && c.c == b.c;
      });
    }function Uj(b) {
      var c = new Tj();b = q(b);for (var d = b.next(); !d.done; d = b.next()) {
        c.add(new Xj(d.value));
      }return c;
    };function Z(b) {
      var c = this;if (b && b.constructor != X) throw new A(2, 9, 9008);this.b = this.a = null;b ? (this.a = b.c, this.b = b.gb()) : (this.a = Yi(), this.b = new F());this.g = !1;this.c = [];this.f = [];var d = !b;this.h = new ah(function () {
        return r(function f() {
          var b;return v(f, function (f) {
            switch (f.l) {case 1:
                return b = function b() {}, u(f, Promise.all(c.f.map(function (c) {
                  return c.then(b, b);
                })), 2);case 2:
                if (!d) {
                  f.D(3);break;
                }return u(f, c.b.destroy(), 3);case 3:
                c.a = null, c.b = null, f.l = 0;}
          });
        });
      });
    }y("shaka.offline.Storage", Z);
    function Zj() {
      return oi();
    }Z.support = Zj;Z.prototype.destroy = function () {
      return this.h.destroy();
    };Z.prototype.destroy = Z.prototype.destroy;
    Z.prototype.configure = function (b) {
      var c = !1;null != b.trackSelectionCallback && (c = !0, b.offline = b.offline || {}, b.offline.trackSelectionCallback = b.trackSelectionCallback);null != b.progressCallback && (c = !0, b.offline = b.offline || {}, b.offline.progressCallback = b.progressCallback);null != b.usePersistentLicense && (c = !0, b.offline = b.offline || {}, b.offline.usePersistentLicense = b.usePersistentLicense);c && Ka("Storage.configure should now be passed a player configuration structure. Using a non-player configuration will be deprecated in v2.6.");
      return $i(this.a, b);
    };Z.prototype.configure = Z.prototype.configure;Z.prototype.gb = function () {
      return this.b;
    };Z.prototype.getNetworkingEngine = Z.prototype.gb;
    Z.prototype.store = function (b, c, d) {
      var e = this;return ak(this, bk(this, b, c || {}, function () {
        return r(function g() {
          var c;return v(g, function (g) {
            switch (g.l) {case 1:
                if (d && "string" != typeof d) {
                  Ka("Loading with a manifest parser factory is deprecated. Instead please register a manifest parser and pass in the mime type.");c = d;g.D(2);break;
                }return u(g, kf(b, e.b, e.a.manifest.retryParameters, d), 3);case 3:
                c = g.A;case 2:
                return g["return"](new c());}
          });
        });
      }));
    };Z.prototype.store = Z.prototype.store;
    function bk(b, c, d, e) {
      return r(function g() {
        var h, k, l, m, p, t, w, x, B, R;return v(g, function (g) {
          switch (g.l) {case 1:
              ck();if (b.g) return g["return"](Promise.reject(new A(2, 9, 9006)));b.g = !0;return u(g, dk(b, c, e), 2);case 2:
              h = g.A;ek(b);k = !h.presentationTimeline.W() && !h.presentationTimeline.Fa();if (!k) throw new A(2, 9, 9005, c);l = null;m = new gi();t = p = null;na(g, 3, 4);return u(g, fk(b, h, function (b) {
                t = t || b;
              }), 6);case 6:
              l = g.A;ek(b);if (t) throw t;gk(b, h, l);return u(g, m.init(), 7);case 7:
              return ek(b), u(g, ii(m), 8);case 8:
              return p = g.A, ek(b), u(g, hk(b, p.U, l, h, c, d), 9);case 9:
              w = g.A;ek(b);if (t) throw t;return u(g, p.U.addManifests([w]), 10);case 10:
              return x = g.A, ek(b), B = new Gi("manifest", p.path.ja, p.path.U, x[0]), g["return"](Lj(B, w));case 4:
              return sa(g), b.g = !1, b.c = [], u(g, m.destroy(), 11);case 11:
              if (!l) {
                g.D(12);break;
              }return u(g, l.destroy(), 12);case 12:
              ta(g, 0);break;case 3:
              R = ra(g);if (!p) {
                g.D(14);break;
              }return u(g, p.U.removeSegments(b.c, function () {}), 14);case 14:
              throw t || R;}
        });
      });
    }
    function gk(b, c, d) {
      Pj(c, b.a.restrictions);Qj(c);Rj(c, d);Sj(c);Yj(c, function (c) {
        var d = [];d = d.concat(J.Ta(c, null, null));d = d.concat(J.Sa(c, null));d = b.a.offline.trackSelectionCallback(d);var e = new Set(),
            h = new Set();d = q(d);for (var k = d.next(); !k.done; k = d.next()) {
          k = k.value, "variant" == k.type && e.add(k.id), "text" == k.type && h.add(k.id);
        }c.variants = c.variants.filter(function (b) {
          return e.has(b.id);
        });c.textStreams = c.textStreams.filter(function (b) {
          return h.has(b.id);
        });
      });ik(c);
    }
    function hk(b, c, d, e, f, g) {
      return r(function k() {
        var l, m, p;return v(k, function (k) {
          switch (k.l) {case 1:
              return l = Jj(f, e, g), m = new Uh(function (c, d) {
                l.size = d;b.a.offline.progressCallback(l, c);
              }), pa(k, 2), p = jk(b, m, c, d, e, f, g), u(k, Wh(m, b.b), 4);case 4:
              return p.size = l.size, k["return"](p);case 2:
              return sa(k), u(k, m.destroy(), 5);case 5:
              ta(k, 0);}
        });
      });
    }Z.prototype.remove = function (b) {
      return ak(this, kk(this, b));
    };Z.prototype.remove = Z.prototype.remove;
    function kk(b, c) {
      ck();var d = Hi(c);if (null == d || "manifest" != d.a) return Promise.reject(new A(2, 9, 9004, c));var e = new gi();return bh([e], function () {
        return r(function g() {
          var c, k, l;return v(g, function (g) {
            switch (g.l) {case 1:
                return u(g, e.init(), 2);case 2:
                return u(g, ki(e, d.ja(), d.U()), 3);case 3:
                return c = g.A, u(g, c.getManifests([d.key()]), 4);case 4:
                return k = g.A, l = k[0], u(g, Promise.all([lk(b, l, e), mk(b, c, d, l)]), 0);}
          });
        });
      });
    }
    function nk(b, c) {
      for (var d = [], e = q(b.periods), f = e.next(); !f.done; f = e.next()) {
        f = q(f.value.streams);for (var g = f.next(); !g.done; g = f.next()) {
          g = g.value, c && "video" == g.contentType ? d.push({ contentType: Kb(g.mimeType, g.codecs), robustness: b.drmInfo.videoRobustness }) : c || "audio" != g.contentType || d.push({ contentType: Kb(g.mimeType, g.codecs), robustness: b.drmInfo.audioRobustness });
        }
      }return d;
    }function lk(b, c, d) {
      return r(function f() {
        return v(f, function (f) {
          switch (f.l) {case 1:
              return u(f, ok(b.b, b.a.drm, d, c), 0);}
        });
      });
    }
    function mk(b, c, d, e) {
      function f() {
        k += 1;b.a.offline.progressCallback(l, k / h);
      }var g = pk(e),
          h = g.length + 1,
          k = 0,
          l = Lj(d, e);return Promise.all([c.removeSegments(g, f), c.removeManifests([d.key()], f)]);
    }Z.prototype.mf = function () {
      return ak(this, qk(this));
    };Z.prototype.removeEmeSessions = Z.prototype.mf;
    function qk(b) {
      ck();var c = b.b,
          d = b.a.drm,
          e = new gi();return bh([e], function () {
        return r(function g() {
          var b, k, l, m, p, t, w;return v(g, function (g) {
            switch (g.l) {case 1:
                return u(g, e.init(), 2);case 2:
                b = !1, k = [], li(e, function (b) {
                  return k.push(b);
                }), l = q(k), m = l.next();case 3:
                if (m.done) {
                  g.D(5);break;
                }p = m.value;return u(g, p.getAll(), 6);case 6:
                return t = g.A, u(g, Si(d, c, t), 7);case 7:
                return w = g.A, u(g, p.remove(w), 8);case 8:
                w.length != t.length && (b = !0);m = l.next();g.D(3);break;case 5:
                return g["return"](!b);}
          });
        });
      });
    }
    Z.prototype.list = function () {
      return ak(this, rk());
    };Z.prototype.list = Z.prototype.list;
    function rk() {
      function b(b, d) {
        return r(function h() {
          var e;return v(h, function (f) {
            switch (f.l) {case 1:
                return u(f, d.getAllManifests(), 2);case 2:
                e = f.A, e.forEach(function (d, e) {
                  var f = Lj(new Gi("manifest", b.ja, b.U, e), d);c.push(f);
                }), f.l = 0;}
          });
        });
      }ck();var c = [],
          d = new gi();return bh([d], function () {
        return r(function f() {
          var c;return v(f, function (f) {
            switch (f.l) {case 1:
                return u(f, d.init(), 2);case 2:
                return c = Promise.resolve(), ji(d, function (d, f) {
                  c = c.then(function () {
                    return b(d, f);
                  });
                }), u(f, c, 0);}
          });
        });
      }).then(function () {
        return c;
      });
    }
    function dk(b, c, d) {
      return r(function f() {
        var g, h, k, l, m, p, t, w, x;return v(f, function (f) {
          switch (f.l) {case 1:
              return g = null, h = b.b, k = { networkingEngine: h, filterAllPeriods: function filterAllPeriods() {}, filterNewPeriod: function filterNewPeriod() {}, onTimelineRegionAdded: function onTimelineRegionAdded() {}, onEvent: function onEvent() {}, onError: function onError(b) {
                  g = b;
                } }, u(f, d(), 2);case 2:
              return l = f.A, l.configure(b.a.manifest), ek(b), pa(f, 3), u(f, l.start(c, k), 5);case 5:
              m = f.A;ek(b);p = new Set();for (var B = q(m.periods), Q = B.next(); !Q.done; Q = B.next()) {
                t = Q.value;Q = q(t.variants);for (var O = Q.next(); !O.done; O = Q.next()) {
                  w = O.value, w.audio && p.add(w.audio), w.video && p.add(w.video);
                }Q = q(t.textStreams);for (O = Q.next(); !O.done; O = Q.next()) {
                  x = O.value, p.add(x);
                }
              }return u(f, Promise.all(Array.from(p).map(function (b) {
                return b.createSegmentIndex();
              })), 6);case 6:
              ek(b);if (g) throw g;return f["return"](m);case 3:
              return sa(f), u(f, l.stop(), 7);case 7:
              ta(f, 0);}
        });
      });
    }
    function fk(b, c, d) {
      return r(function f() {
        var g, h, k;return v(f, function (f) {
          switch (f.l) {case 1:
              return g = new dc({ Ob: b.b, onError: d, ld: function ld() {}, onExpirationUpdated: function onExpirationUpdated() {}, onEvent: function onEvent() {} }), h = J.Yc(c), k = b.a, g.configure(k.drm), u(f, ic(g, h, k.offline.usePersistentLicense), 2);case 2:
              return u(f, rc(g), 3);case 3:
              return u(f, sc(g), 4);case 4:
              return f["return"](g);}
        });
      });
    }
    function jk(b, c, d, e, f, g, h) {
      var k = new Mj(),
          l = f.periods.map(function (e) {
        return sk(b, c, d, k, f, e);
      }),
          m = e.a,
          p = wc(e);if (m && b.a.offline.usePersistentLicense) {
        if (!p.length) throw new A(2, 9, 9007, g);m.initData = [];
      }return { originalManifestUri: g, duration: f.presentationTimeline.S(), size: 0, expiration: e.Lb(), periods: l, sessionIds: b.a.offline.usePersistentLicense ? p : [], drmInfo: m, appMetadata: h };
    }
    function sk(b, c, d, e, f, g) {
      f.periods.forEach(function (b) {
        b.variants.forEach(function (b) {
          var c = b.audio,
              d = b.video;c && !d && (e.a[c.id] = c.bandwidth || b.bandwidth);!c && d && (e.a[d.id] = d.bandwidth || b.bandwidth);if (c && d) {
            var f = c.bandwidth || 393216,
                g = d.bandwidth || b.bandwidth - f;0 >= g && (g = b.bandwidth);e.a[c.id] = f;e.a[d.id] = g;
          }
        });b.textStreams.forEach(function (b) {
          e.a[b.id] = 52;
        });
      });var h = tk(f),
          k = new Map();h = q(h);for (var l = h.next(); !l.done; l = h.next()) {
        l = l.value;var m = uk(b, c, d, e, f, l);k.set(l.id, m);
      }g.variants.forEach(function (b) {
        b.audio && k.get(b.audio.id).variantIds.push(b.id);b.video && k.get(b.video.id).variantIds.push(b.id);
      });return { startTime: g.startTime, streams: Array.from(k.values()) };
    }
    function uk(b, c, d, e, f, g) {
      var h = { id: g.id, originalId: g.originalId, primary: g.primary, presentationTimeOffset: g.presentationTimeOffset || 0, contentType: g.type, mimeType: g.mimeType, codecs: g.codecs, frameRate: g.frameRate, kind: g.kind, language: g.language, label: g.label, width: g.width || null, height: g.height || null, initSegmentKey: null, encrypted: g.encrypted, keyId: g.keyId, segments: [], variantIds: [] };f = f.presentationTimeline.jb();var k = g.id;vk(g, f, function (f) {
        Vh(c, k, wk(b, f), Nj(e, g.id, f), function (c) {
          return d.addSegments([{ data: c }]).then(function (c) {
            b.c.push(c[0]);
            h.segments.push({ startTime: f.startTime, endTime: f.endTime, dataKey: c[0] });
          });
        });
      });(f = g.initSegmentReference) && Vh(c, k, wk(b, f), .5 * Oj(e, g.id), function (c) {
        return d.addSegments([{ data: c }]).then(function (c) {
          b.c.push(c[0]);h.initSegmentKey = c[0];
        });
      });return h;
    }function vk(b, c, d) {
      c = b.findSegmentPosition(c);for (var e = null == c ? null : b.getSegmentReference(c); e;) {
        d(e), e = b.getSegmentReference(++c);
      }
    }function ek(b) {
      if (b.h.a) throw new A(2, 9, 7001);
    }function ck() {
      if (!oi()) throw new A(2, 9, 9E3);
    }
    function wk(b, c) {
      var d = b.a.streaming.retryParameters;d = xb(c.c(), d);if (0 != c.b || null != c.a) d.headers.Range = "bytes=" + c.b + "-" + (null == c.a ? "" : c.a);return d;
    }function ak(b, c) {
      return r(function e() {
        return v(e, function (e) {
          switch (e.l) {case 1:
              return b.f.push(c), pa(e, 2), u(e, c, 4);case 4:
              return e["return"](e.A);case 2:
              sa(e), ob(b.f, c), ta(e, 0);}
        });
      });
    }
    function pk(b) {
      var c = [];b.periods.forEach(function (b) {
        b.streams.forEach(function (b) {
          null != b.initSegmentKey && c.push(b.initSegmentKey);b.segments.forEach(function (b) {
            c.push(b.dataKey);
          });
        });
      });return c;
    }Z.deleteAll = function () {
      return r(function c() {
        var d;return v(c, function (c) {
          switch (c.l) {case 1:
              return d = new gi(), pa(c, 2), u(c, d.erase(), 2);case 2:
              return sa(c), u(c, d.destroy(), 5);case 5:
              ta(c, 0);}
        });
      });
    };
    function ok(b, c, d, e) {
      return r(function g() {
        var h, k, l;return v(g, function (g) {
          switch (g.l) {case 1:
              if (!e.drmInfo) return g["return"]();h = mi(d);k = e.sessionIds.map(function (b) {
                return { sessionId: b, keySystem: e.drmInfo.keySystem, licenseUri: e.drmInfo.licenseServerUri, serverCertificate: e.drmInfo.serverCertificate, audioCapabilities: nk(e, !1), videoCapabilities: nk(e, !0) };
              });return u(g, Si(c, b, k), 2);case 2:
              return l = g.A, u(g, h.remove(l), 3);case 3:
              return u(g, h.add(k.filter(function (b) {
                return -1 == l.indexOf(b.sessionId);
              })), 0);}
        });
      });
    }function tk(b) {
      var c = new Set();b.periods.forEach(function (b) {
        b.textStreams.forEach(function (b) {
          c.add(b);
        });b.variants.forEach(function (b) {
          b.audio && c.add(b.audio);b.video && c.add(b.video);
        });
      });return c;
    }function ik(b) {
      if (0 == b.periods.length) throw new A(2, 4, 4014);b = q(b.periods);for (var c = b.next(); !c.done; c = b.next()) {
        xk(c.value);
      }
    }
    function xk(b) {
      b.variants.map(function (b) {
        return b.video;
      });var c = new Set(b.variants.map(function (b) {
        return b.audio;
      }));b = b.textStreams;for (var d = q(c), e = d.next(); !e.done; e = d.next()) {
        e = q(c);for (var f = e.next(); !f.done; f = e.next()) {}
      }c = q(b);for (d = c.next(); !d.done; d = c.next()) {
        for (d = q(b), e = d.next(); !e.done; e = d.next()) {}
      }
    }fj.offline = Zj;y("shaka.polyfill.installAll", function () {
      for (var b = 0; b < yk.length; ++b) {
        yk[b].Ud();
      }
    });var yk = [];function zk(b, c) {
      c = c || 0;for (var d = { priority: c, Ud: b }, e = 0; e < yk.length; e++) {
        if (yk[e].priority < c) {
          yk.splice(e, 0, d);return;
        }
      }yk.push(d);
    }y("shaka.polyfill.register", zk);function Ak(b) {
      var c = b.type.replace(/^(webkit|moz|MS)/, "").toLowerCase();if ("function" === typeof Event) var d = new Event(c, b);else d = document.createEvent("Event"), d.initEvent(c, b.bubbles, b.cancelable);b.target.dispatchEvent(d);
    }
    zk(function () {
      if (window.Document) {
        var b = Element.prototype;b.requestFullscreen = b.requestFullscreen || b.mozRequestFullScreen || b.msRequestFullscreen || b.webkitRequestFullscreen;b = Document.prototype;b.exitFullscreen = b.exitFullscreen || b.mozCancelFullScreen || b.msExitFullscreen || b.webkitExitFullscreen;"fullscreenElement" in document || (Object.defineProperty(document, "fullscreenElement", { get: function get() {
            return document.mozFullScreenElement || document.msFullscreenElement || document.webkitFullscreenElement;
          } }), Object.defineProperty(document, "fullscreenEnabled", { get: function get() {
            return document.mozFullScreenEnabled || document.msFullscreenEnabled || document.webkitFullscreenEnabled;
          } }));document.addEventListener("webkitfullscreenchange", Ak);document.addEventListener("webkitfullscreenerror", Ak);document.addEventListener("mozfullscreenchange", Ak);document.addEventListener("mozfullscreenerror", Ak);document.addEventListener("MSFullscreenChange", Ak);document.addEventListener("MSFullscreenError", Ak);
      }
    });zk(function () {
      var b = navigator.userAgent;b && b.includes("CrKey") && delete window.indexedDB;
    });var Bk;function Ck(b, c, d) {
      if ("input" == b) switch (this.type) {case "range":
          b = "change";}Bk.call(this, b, c, d);
    }zk(function () {
      navigator.userAgent.includes("Trident/") && HTMLInputElement.prototype.addEventListener != Ck && (Bk = HTMLInputElement.prototype.addEventListener, HTMLInputElement.prototype.addEventListener = Ck);
    });zk(function () {});function Dk() {
      var b = MediaSource.prototype.addSourceBuffer;MediaSource.prototype.addSourceBuffer = function (c) {
        for (var d = [], e = 0; e < arguments.length; ++e) {
          d[e] = arguments[e];
        }d = b.apply(this, d);d.abort = function () {};return d;
      };
    }function Ek() {
      var b = SourceBuffer.prototype.remove;SourceBuffer.prototype.remove = function (c, d) {
        return b.call(this, c, d - .001);
      };
    }
    function Fk() {
      var b = MediaSource.prototype.endOfStream;MediaSource.prototype.endOfStream = function (c) {
        for (var d = [], e = 0; e < arguments.length; ++e) {
          d[e] = arguments[e];
        }for (var h = e = 0; h < this.sourceBuffers.length; ++h) {
          var k = this.sourceBuffers[h];k = k.buffered.end(k.buffered.length - 1);e = Math.max(e, k);
        }if (!isNaN(this.duration) && e < this.duration) for (this.bd = !0, e = 0; e < this.sourceBuffers.length; ++e) {
          this.sourceBuffers[e].Sc = !1;
        }return b.apply(this, d);
      };var c = !1,
          d = MediaSource.prototype.addSourceBuffer;MediaSource.prototype.addSourceBuffer = function (b) {
        for (var e = [], g = 0; g < arguments.length; ++g) {
          e[g] = arguments[g];
        }e = d.apply(this, e);e.mediaSource_ = this;e.addEventListener("updateend", Gk, !1);c || (this.addEventListener("sourceclose", Hk, !1), c = !0);return e;
      };
    }function Gk(b) {
      var c = b.target,
          d = c.mediaSource_;if (d.bd) {
        b.preventDefault();b.stopPropagation();b.stopImmediatePropagation();c.Sc = !0;for (b = 0; b < d.sourceBuffers.length; ++b) {
          if (0 == d.sourceBuffers[b].Sc) return;
        }d.bd = !1;
      }
    }
    function Hk(b) {
      b = b.target;for (var c = 0; c < b.sourceBuffers.length; ++c) {
        b.sourceBuffers[c].removeEventListener("updateend", Gk, !1);
      }b.removeEventListener("sourceclose", Hk, !1);
    }function Ik() {
      var b = MediaSource.isTypeSupported;MediaSource.isTypeSupported = function (c) {
        return "mp2t" == c.split(/ *; */)[0].split("/")[1] ? !1 : b(c);
      };
    }
    function Jk() {
      var b = MediaSource.isTypeSupported,
          c = /^dv(?:he|av)\./;MediaSource.isTypeSupported = function (d) {
        for (var e = d.split(/ *; */), f = e[0], g = {}, h = 1; h < e.length; ++h) {
          var k = e[h].split("="),
              l = k[0];k = k[1].replace(/"(.*)"/, "$1");g[l] = k;
        }e = g.codecs;if (!e) return b(d);var m = !1,
            p = !1;d = e.split(",").filter(function (b) {
          if (c.test(b)) return p = !0, !1;/^(hev|hvc)1\.2/.test(b) && (m = !0);return !0;
        });p && (m = !1);g.codecs = d.join(",");m && (g.eotf = "smpte2084");for (var t in g) {
          f += "; " + t + '="' + g[t] + '"';
        }return cast.__platform__.canDisplayType(f);
      };
    }
    zk(function () {
      if (window.MediaSource) if (window.cast && cast.__platform__ && cast.__platform__.canDisplayType) Jk();else if (navigator.vendor && navigator.vendor.includes("Apple")) {
        var b = navigator.appVersion;Ik();b.includes("Version/8") ? window.MediaSource = null : b.includes("Version/9") ? Dk() : b.includes("Version/10") ? (Dk(), Fk()) : b.includes("Version/11") && (Dk(), Ek());
      }
    });function Kk(b) {
      this.f = [];this.b = [];this.a = [];new S().$("pssh", this.c.bind(this)).parse(b.buffer);
    }Kk.prototype.c = function (b) {
      if (!(1 < b.version)) {
        var c = ac(b.reader.Ja(16)),
            d = [];if (0 < b.version) for (var e = b.reader.C(), f = 0; f < e; ++f) {
          var g = ac(b.reader.Ja(16));d.push(g);
        }e = b.reader.C();b.reader.I(e);this.b.push.apply(this.b, d);this.f.push(c);this.a.push({ start: b.start, end: b.start + b.size - 1 });
      }
    };function Lk(b, c) {
      try {
        var d = new Mk(b, c);return Promise.resolve(d);
      } catch (e) {
        return Promise.reject(e);
      }
    }
    function Mk(b, c) {
      this.keySystem = b;for (var d = !1, e = 0; e < c.length; ++e) {
        var f = c[e],
            g = { audioCapabilities: [], videoCapabilities: [], persistentState: "optional", distinctiveIdentifier: "optional", initDataTypes: f.initDataTypes, sessionTypes: ["temporary"], label: f.label },
            h = !1;if (f.audioCapabilities) for (var k = 0; k < f.audioCapabilities.length; ++k) {
          var l = f.audioCapabilities[k];if (l.contentType) {
            h = !0;var m = l.contentType.split(";")[0];MSMediaKeys.isTypeSupported(this.keySystem, m) && (g.audioCapabilities.push(l), d = !0);
          }
        }if (f.videoCapabilities) for (k = 0; k < f.videoCapabilities.length; ++k) {
          l = f.videoCapabilities[k], l.contentType && (h = !0, m = l.contentType.split(";")[0], MSMediaKeys.isTypeSupported(this.keySystem, m) && (g.videoCapabilities.push(l), d = !0));
        }h || (d = MSMediaKeys.isTypeSupported(this.keySystem, "video/mp4"));"required" == f.persistentState && (d = !1);if (d) {
          this.a = g;return;
        }
      }d = Error("Unsupported keySystem");d.name = "NotSupportedError";d.code = DOMException.NOT_SUPPORTED_ERR;throw d;
    }Mk.prototype.createMediaKeys = function () {
      var b = new Nk(this.keySystem);return Promise.resolve(b);
    };
    Mk.prototype.getConfiguration = function () {
      return this.a;
    };function Ok(b) {
      var c = this.mediaKeys;c && c != b && Pk(c, null);delete this.mediaKeys;return (this.mediaKeys = b) ? Pk(b, this) : Promise.resolve();
    }function Nk(b) {
      this.a = new MSMediaKeys(b);this.b = new Cb();
    }Nk.prototype.createSession = function (b) {
      b = b || "temporary";if ("temporary" != b) throw new TypeError("Session type " + b + " is unsupported on this platform.");return new Qk(this.a, b);
    };Nk.prototype.setServerCertificate = function () {
      return Promise.resolve(!1);
    };
    function Pk(b, c) {
      function d() {
        c.msSetMediaKeys(e.a);c.removeEventListener("loadedmetadata", d);
      }Db(b.b);if (!c) return Promise.resolve();G(b.b, c, "msneedkey", Rk);var e = b;try {
        return 1 <= c.readyState ? c.msSetMediaKeys(b.a) : c.addEventListener("loadedmetadata", d), Promise.resolve();
      } catch (f) {
        return Promise.reject(f);
      }
    }function Qk(b) {
      E.call(this);this.c = null;this.g = b;this.b = this.a = null;this.f = new Cb();this.sessionId = "";this.expiration = NaN;this.closed = new z();this.keyStatuses = new Sk();
    }Fa(Qk, E);n = Qk.prototype;
    n.generateRequest = function (b, c) {
      this.a = new z();try {
        this.c = this.g.createSession("video/mp4", new Uint8Array(c), null), G(this.f, this.c, "mskeymessage", this.Oe.bind(this)), G(this.f, this.c, "mskeyadded", this.Me.bind(this)), G(this.f, this.c, "mskeyerror", this.Ne.bind(this)), Tk(this, "status-pending");
      } catch (d) {
        this.a.reject(d);
      }return this.a;
    };n.load = function () {
      return Promise.reject(Error("MediaKeySession.load not yet supported"));
    };n.update = function (b) {
      this.b = new z();try {
        this.c.update(new Uint8Array(b));
      } catch (c) {
        this.b.reject(c);
      }return this.b;
    };
    n.close = function () {
      try {
        this.c.close(), this.closed.resolve(), Db(this.f);
      } catch (b) {
        this.closed.reject(b);
      }return this.closed;
    };n.remove = function () {
      return Promise.reject(Error("MediaKeySession.remove is only applicable for persistent licenses, which are not supported on this platform"));
    };function Rk(b) {
      var c = document.createEvent("CustomEvent");c.initCustomEvent("encrypted", !1, !1, null);c.initDataType = "cenc";c.initData = Uk(b.initData);this.dispatchEvent(c);
    }
    function Uk(b) {
      if (!b) return b;var c = new Kk(b);if (1 >= c.a.length) return b;for (var d = [], e = 0; e < c.a.length; e++) {
        d.push(b.subarray(c.a[e].start, c.a[e].end + 1));
      }b = [];c = {};e = q(d);for (d = e.next(); !d.done; c = { Mb: c.Mb }, d = e.next()) {
        c.Mb = d.value, b.some(function (b) {
          return function (c) {
            return bc(c, b.Mb);
          };
        }(c)) || b.push(c.Mb);
      }c = 0;e = q(b);for (d = e.next(); !d.done; d = e.next()) {
        c += d.value.length;
      }c = new Uint8Array(c);e = 0;b = q(b);for (d = b.next(); !d.done; d = b.next()) {
        d = d.value, c.set(d, e), e += d.length;
      }return c;
    }
    n.Oe = function (b) {
      this.a && (this.a.resolve(), this.a = null);this.dispatchEvent(new D("message", { messageType: void 0 == this.keyStatuses.a ? "licenserequest" : "licenserenewal", message: b.message.buffer }));
    };n.Me = function () {
      this.a ? (Tk(this, "usable"), this.a.resolve(), this.a = null) : this.b && (Tk(this, "usable"), this.b.resolve(), this.b = null);
    };
    n.Ne = function () {
      var b = Error("EME PatchedMediaKeysMs key error");b.errorCode = this.c.error;if (null != this.a) this.a.reject(b), this.a = null;else if (null != this.b) this.b.reject(b), this.b = null;else switch (this.c.error.code) {case MSMediaKeyError.MS_MEDIA_KEYERR_OUTPUT:case MSMediaKeyError.MS_MEDIA_KEYERR_HARDWARECHANGE:
          Tk(this, "output-not-allowed");break;default:
          Tk(this, "internal-error");}
    };function Tk(b, c) {
      var d = b.keyStatuses;d.size = void 0 == c ? 0 : 1;d.a = c;b.dispatchEvent(new D("keystatuseschange"));
    }
    function Sk() {
      this.size = 0;this.a = void 0;
    }var Vk;n = Sk.prototype;n.forEach = function (b) {
      this.a && b(this.a, Vk);
    };n.get = function (b) {
      if (this.has(b)) return this.a;
    };n.has = function (b) {
      var c = Vk;return this.a && bc(new Uint8Array(b), new Uint8Array(c)) ? !0 : !1;
    };n.entries = function () {};n.keys = function () {};n.values = function () {};
    zk(function () {
      !window.HTMLVideoElement || !window.MSMediaKeys || navigator.requestMediaKeySystemAccess && MediaKeySystemAccess.prototype.getConfiguration || (Vk = new Uint8Array([0]).buffer, delete HTMLMediaElement.prototype.mediaKeys, HTMLMediaElement.prototype.mediaKeys = null, HTMLMediaElement.prototype.setMediaKeys = Ok, window.MediaKeys = Nk, window.MediaKeySystemAccess = Mk, navigator.requestMediaKeySystemAccess = Lk);
    });function Wk() {
      return Promise.reject(Error("The key system specified is not supported."));
    }function Xk(b) {
      return null == b ? Promise.resolve() : Promise.reject(Error("MediaKeys not supported."));
    }function Yk() {
      throw new TypeError("Illegal constructor.");
    }Yk.prototype.createSession = function () {};Yk.prototype.setServerCertificate = function () {};function Zk() {
      throw new TypeError("Illegal constructor.");
    }Zk.prototype.getConfiguration = function () {};Zk.prototype.createMediaKeys = function () {};
    zk(function () {
      !window.HTMLVideoElement || navigator.requestMediaKeySystemAccess && MediaKeySystemAccess.prototype.getConfiguration || (navigator.requestMediaKeySystemAccess = Wk, delete HTMLMediaElement.prototype.mediaKeys, HTMLMediaElement.prototype.mediaKeys = null, HTMLMediaElement.prototype.setMediaKeys = Xk, window.MediaKeys = Yk, window.MediaKeySystemAccess = Zk);
    }, -10);var $k = "";function al(b) {
      var c = $k;return c ? c + b.charAt(0).toUpperCase() + b.slice(1) : b;
    }function bl(b, c) {
      try {
        var d = new cl(b, c);return Promise.resolve(d);
      } catch (e) {
        return Promise.reject(e);
      }
    }function dl(b) {
      var c = this.mediaKeys;c && c != b && el(c, null);delete this.mediaKeys;(this.mediaKeys = b) && el(b, this);return Promise.resolve();
    }
    function cl(b, c) {
      this.a = this.keySystem = b;var d = !1;"org.w3.clearkey" == b && (this.a = "webkit-org.w3.clearkey", d = !1);var e = !1;var f = document.getElementsByTagName("video");f = f.length ? f[0] : document.createElement("video");for (var g = 0; g < c.length; ++g) {
        var h = c[g],
            k = { audioCapabilities: [], videoCapabilities: [], persistentState: "optional", distinctiveIdentifier: "optional", initDataTypes: h.initDataTypes, sessionTypes: ["temporary"], label: h.label },
            l = !1;if (h.audioCapabilities) for (var m = 0; m < h.audioCapabilities.length; ++m) {
          var p = h.audioCapabilities[m];if (p.contentType) {
            l = !0;var t = p.contentType.split(";")[0];f.canPlayType(t, this.a) && (k.audioCapabilities.push(p), e = !0);
          }
        }if (h.videoCapabilities) for (m = 0; m < h.videoCapabilities.length; ++m) {
          p = h.videoCapabilities[m], p.contentType && (l = !0, f.canPlayType(p.contentType, this.a) && (k.videoCapabilities.push(p), e = !0));
        }l || (e = f.canPlayType("video/mp4", this.a) || f.canPlayType("video/webm", this.a));"required" == h.persistentState && (d ? (k.persistentState = "required", k.sessionTypes = ["persistent-license"]) : e = !1);if (e) {
          this.b = k;return;
        }
      }d = "Unsupported keySystem";if ("org.w3.clearkey" == b || "com.widevine.alpha" == b) d = "None of the requested configurations were supported.";d = Error(d);d.name = "NotSupportedError";d.code = DOMException.NOT_SUPPORTED_ERR;throw d;
    }cl.prototype.createMediaKeys = function () {
      var b = new fl(this.a);return Promise.resolve(b);
    };cl.prototype.getConfiguration = function () {
      return this.b;
    };function fl(b) {
      this.g = b;this.b = null;this.a = new Cb();this.c = [];this.f = {};
    }
    function el(b, c) {
      b.b = c;Db(b.a);var d = $k;c && (G(b.a, c, d + "needkey", b.$e.bind(b)), G(b.a, c, d + "keymessage", b.Ze.bind(b)), G(b.a, c, d + "keyadded", b.Xe.bind(b)), G(b.a, c, d + "keyerror", b.Ye.bind(b)));
    }n = fl.prototype;n.createSession = function (b) {
      b = b || "temporary";if ("temporary" != b && "persistent-license" != b) throw new TypeError("Session type " + b + " is unsupported on this platform.");var c = this.b || document.createElement("video");c.src || (c.src = "about:blank");b = new gl(c, this.g, b);this.c.push(b);return b;
    };
    n.setServerCertificate = function () {
      return Promise.resolve(!1);
    };n.$e = function (b) {
      var c = document.createEvent("CustomEvent");c.initCustomEvent("encrypted", !1, !1, null);c.initDataType = "webm";c.initData = b.initData;this.b.dispatchEvent(c);
    };n.Ze = function (b) {
      var c = hl(this, b.sessionId);c && (b = new D("message", { messageType: void 0 == c.keyStatuses.a ? "licenserequest" : "licenserenewal", message: b.message }), c.b && (c.b.resolve(), c.b = null), c.dispatchEvent(b));
    };
    n.Xe = function (b) {
      if (b = hl(this, b.sessionId)) il(b, "usable"), b.a && b.a.resolve(), b.a = null;
    };
    n.Ye = function (b) {
      var c = hl(this, b.sessionId);if (c) {
        var d = Error("EME v0.1b key error");d.errorCode = b.errorCode;d.errorCode.systemCode = b.systemCode;!b.sessionId && c.b ? (d.method = "generateRequest", 45 == b.systemCode && (d.message = "Unsupported session type."), c.b.reject(d), c.b = null) : b.sessionId && c.a ? (d.method = "update", c.a.reject(d), c.a = null) : (d = b.systemCode, b.errorCode.code == MediaKeyError.MEDIA_KEYERR_OUTPUT ? il(c, "output-restricted") : 1 == d ? il(c, "expired") : il(c, "internal-error"));
      }
    };
    function hl(b, c) {
      var d = b.f[c];return d ? d : (d = b.c.shift()) ? (d.sessionId = c, b.f[c] = d) : null;
    }function gl(b, c, d) {
      E.call(this);this.f = b;this.h = !1;this.a = this.b = null;this.c = c;this.g = d;this.sessionId = "";this.expiration = NaN;this.closed = new z();this.keyStatuses = new jl();
    }Fa(gl, E);
    function kl(b, c, d) {
      if (b.h) return Promise.reject(Error("The session is already initialized."));b.h = !0;try {
        if ("persistent-license" == b.g) {
          if (d) var e = new Uint8Array(Wb("LOAD_SESSION|" + d));else {
            var f = Wb("PERSISTENT|"),
                g = new Uint8Array(f.byteLength + c.byteLength);g.set(new Uint8Array(f), 0);g.set(new Uint8Array(c), f.byteLength);e = g;
          }
        } else e = new Uint8Array(c);
      } catch (k) {
        return Promise.reject(k);
      }b.b = new z();var h = al("generateKeyRequest");try {
        b.f[h](b.c, e);
      } catch (k) {
        if ("InvalidStateError" != k.name) return b.b = null, Promise.reject(k);
        setTimeout(function () {
          try {
            this.f[h](this.c, e);
          } catch (l) {
            this.b.reject(l), this.b = null;
          }
        }.bind(b), 10);
      }return b.b;
    }n = gl.prototype;
    n.Ec = function (b, c) {
      if (this.a) this.a.then(this.Ec.bind(this, b, c))["catch"](this.Ec.bind(this, b, c));else {
        this.a = b;if ("webkit-org.w3.clearkey" == this.c) {
          var d = Ob(c);var e = JSON.parse(d);"oct" != e.keys[0].kty && (this.a.reject(Error("Response is not a valid JSON Web Key Set.")), this.a = null);d = Zb(e.keys[0].k);e = Zb(e.keys[0].kid);
        } else d = new Uint8Array(c), e = null;var f = al("addKey");try {
          this.f[f](this.c, d, e, this.sessionId);
        } catch (g) {
          this.a.reject(g), this.a = null;
        }
      }
    };
    function il(b, c) {
      var d = b.keyStatuses;d.size = void 0 == c ? 0 : 1;d.a = c;b.dispatchEvent(new D("keystatuseschange"));
    }n.generateRequest = function (b, c) {
      return kl(this, c, null);
    };n.load = function (b) {
      return "persistent-license" == this.g ? kl(this, null, b) : Promise.reject(Error("Not a persistent session."));
    };n.update = function (b) {
      var c = new z();this.Ec(c, b);return c;
    };
    n.close = function () {
      if ("persistent-license" != this.g) {
        if (!this.sessionId) return this.closed.reject(Error("The session is not callable.")), this.closed;var b = al("cancelKeyRequest");try {
          this.f[b](this.c, this.sessionId);
        } catch (c) {}
      }this.closed.resolve();return this.closed;
    };n.remove = function () {
      return "persistent-license" != this.g ? Promise.reject(Error("Not a persistent session.")) : this.close();
    };function jl() {
      this.size = 0;this.a = void 0;
    }var ll;n = jl.prototype;n.forEach = function (b) {
      this.a && b(this.a, ll);
    };n.get = function (b) {
      if (this.has(b)) return this.a;
    };
    n.has = function (b) {
      var c = ll;return this.a && bc(new Uint8Array(b), new Uint8Array(c)) ? !0 : !1;
    };n.entries = function () {};n.keys = function () {};n.values = function () {};
    zk(function () {
      if (!(!window.HTMLVideoElement || navigator.requestMediaKeySystemAccess && MediaKeySystemAccess.prototype.getConfiguration)) {
        if (HTMLMediaElement.prototype.webkitGenerateKeyRequest) $k = "webkit";else if (!HTMLMediaElement.prototype.generateKeyRequest) return;ll = new Uint8Array([0]).buffer;navigator.requestMediaKeySystemAccess = bl;delete HTMLMediaElement.prototype.mediaKeys;HTMLMediaElement.prototype.mediaKeys = null;HTMLMediaElement.prototype.setMediaKeys = dl;window.MediaKeys = fl;window.MediaKeySystemAccess = cl;
      }
    });zk(function () {
      if (window.HTMLMediaElement) {
        var b = HTMLMediaElement.prototype.play;HTMLMediaElement.prototype.play = function () {
          var c = b.apply(this);c && c["catch"](function () {});return c;
        };
      }
    });function ml() {
      return { droppedVideoFrames: this.webkitDroppedFrameCount, totalVideoFrames: this.webkitDecodedFrameCount, corruptedVideoFrames: 0, creationTime: NaN, totalFrameDelay: 0 };
    }zk(function () {
      if (window.HTMLVideoElement) {
        var b = HTMLVideoElement.prototype;!b.getVideoPlaybackQuality && "webkitDroppedFrameCount" in b && (b.getVideoPlaybackQuality = ml);
      }
    });function nl(b, c, d) {
      return new window.TextTrackCue(b, c, d);
    }function ol(b, c, d) {
      return new window.TextTrackCue(b + "-" + c + "-" + d, b, c, d);
    }zk(function () {
      if (!window.VTTCue && window.TextTrackCue) {
        var b = TextTrackCue.length;if (3 == b) window.VTTCue = nl;else if (6 == b) window.VTTCue = ol;else {
          try {
            var c = !!nl(1, 2, "");
          } catch (d) {
            c = !1;
          }c && (window.VTTCue = nl);
        }
      }
    });function pl() {}pl.prototype.parseInit = function () {};
    pl.prototype.parseMedia = function (b, c) {
      var d = Ob(b),
          e = [],
          f = new DOMParser(),
          g = null;try {
        g = f.parseFromString(d, "text/xml");
      } catch (R) {
        throw new A(2, 2, 2005);
      }if (g) {
        if (f = g.getElementsByTagName("tt")[0]) {
          g = M.getAttributeNS(f, "http://www.w3.org/ns/ttml#parameter", "frameRate");var h = M.getAttributeNS(f, "http://www.w3.org/ns/ttml#parameter", "subFrameRate");var k = M.getAttributeNS(f, "http://www.w3.org/ns/ttml#parameter", "frameRateMultiplier");var l = M.getAttributeNS(f, "http://www.w3.org/ns/ttml#parameter", "tickRate");
          d = f.getAttribute("xml:space") || "default";
        } else throw new A(2, 2, 2005);if ("default" != d && "preserve" != d) throw new A(2, 2, 2005);d = "default" == d;g = new ql(g, h, k, l);h = rl(f.getElementsByTagName("styling")[0]);k = rl(f.getElementsByTagName("layout")[0]);l = [];for (var m = 0; m < k.length; m++) {
          var p = k[m],
              t = h;var w = new Pc();var x = p.getAttribute("xml:id");if (x) {
            w.id = x;var B;if (B = sl(p, t, "extent")) B = (x = tl.exec(B)) || ul.exec(B), null != B && (w.width = Number(B[1]), w.height = Number(B[2]), w.widthUnits = x ? bd : 0, w.heightUnits = x ? bd : 0);if (p = sl(p, t, "origin")) B = (x = tl.exec(p)) || ul.exec(p), null != B && (w.viewportAnchorX = Number(B[1]), w.viewportAnchorY = Number(B[2]), w.viewportAnchorUnits = x ? bd : 0);
          } else w = null;w && l.push(w);
        }f = rl(f.getElementsByTagName("body")[0]);for (m = 0; m < f.length; m++) {
          (w = vl(f[m], c.periodStart, g, h, k, l, d)) && e.push(w);
        }
      }return e;
    };
    var tl = /^(\d{1,2}|100)% (\d{1,2}|100)%$/,
        wl = /^(\d+px|\d+em)$/,
        ul = /^(\d+)px (\d+)px$/,
        xl = /^(\d{2,}):(\d{2}):(\d{2}):(\d{2})\.?(\d+)?$/,
        yl = /^(?:(\d{2,}):)?(\d{2}):(\d{2})$/,
        zl = /^(?:(\d{2,}):)?(\d{2}):(\d{2}\.\d{2,})$/,
        Al = /^(\d*(?:\.\d*)?)f$/,
        Bl = /^(\d*(?:\.\d*)?)t$/,
        Cl = /^(?:(\d*(?:\.\d*)?)h)?(?:(\d*(?:\.\d*)?)m)?(?:(\d*(?:\.\d*)?)s)?(?:(\d*(?:\.\d*)?)ms)?$/,
        Dl = { left: "start", center: Uc, right: "end", start: "start", end: "end" },
        El = { left: "line-left", center: "center", right: "line-right" };
    function rl(b) {
      var c = [];if (!b) return c;for (var d = b.childNodes, e = 0; e < d.length; e++) {
        var f = "span" == d[e].nodeName && "p" == b.nodeName;d[e].nodeType != Node.ELEMENT_NODE || "br" == d[e].nodeName || f || (f = rl(d[e]), c = c.concat(f));
      }c.length || c.push(b);return c;
    }function Fl(b, c) {
      for (var d = b.childNodes, e = 0; e < d.length; e++) {
        if ("br" == d[e].nodeName && 0 < e) d[e - 1].textContent += "\n";else if (0 < d[e].childNodes.length) Fl(d[e], c);else if (c) {
          var f = d[e].textContent.trim();f = f.replace(/\s+/g, " ");d[e].textContent = f;
        }
      }
    }
    function vl(b, c, d, e, f, g, h) {
      if (!b.hasAttribute("begin") && !b.hasAttribute("end") && /^\s*$/.test(b.textContent)) return null;Fl(b, h);h = Gl(b.getAttribute("begin"), d);var k = Gl(b.getAttribute("end"), d);d = Gl(b.getAttribute("dur"), d);var l = b.textContent;null == k && null != d && (k = h + d);if (null == h || null == k) throw new A(2, 2, 2001);c = new Oc(h + c, k + c, l);if ((f = Hl(b, "region", f)) && f.getAttribute("xml:id")) {
        var m = f.getAttribute("xml:id");g = g.filter(function (b) {
          return b.id == m;
        });c.region = g[0];
      }Il(c, b, f, e);return c;
    }
    function Il(b, c, d, e) {
      "rtl" == Jl(c, d, e, "direction") && (b.writingDirection = 1);var f = Jl(c, d, e, "writingMode");"tb" == f || "tblr" == f ? b.writingDirection = 2 : "tbrl" == f ? b.writingDirection = 3 : "rltb" == f || "rl" == f ? b.writingDirection = 1 : f && (b.writingDirection = Sc);if (f = Jl(c, d, e, "textAlign")) b.positionAlign = El[f], b.lineAlign = Dl[f], b.textAlign = Yc[f.toUpperCase()];if (f = Jl(c, d, e, "displayAlign")) b.displayAlign = Zc[f.toUpperCase()];if (f = Jl(c, d, e, "color")) b.color = f;if (f = Jl(c, d, e, "backgroundColor")) b.backgroundColor = f;if (f = Jl(c, d, e, "fontFamily")) b.fontFamily = f;(f = Jl(c, d, e, "fontWeight")) && "bold" == f && (b.fontWeight = 700);(f = Jl(c, d, e, "wrapOption")) && "noWrap" == f && (b.wrapLine = !1);(f = Jl(c, d, e, "lineHeight")) && f.match(wl) && (b.lineHeight = f);(f = Jl(c, d, e, "fontSize")) && f.match(wl) && (b.fontSize = f);if (f = Jl(c, d, e, "fontStyle")) b.fontStyle = ad[f.toUpperCase()];(d = sl(d, e, "textDecoration")) && Kl(b, d);(c = Ll(c, e, "textDecoration")) && Kl(b, c);
    }
    function Kl(b, c) {
      for (var d = c.split(" "), e = 0; e < d.length; e++) {
        switch (d[e]) {case "underline":
            b.textDecoration.includes("underline") || b.textDecoration.push("underline");break;case "noUnderline":
            b.textDecoration.includes("underline") && ob(b.textDecoration, "underline");break;case "lineThrough":
            b.textDecoration.includes("lineThrough") || b.textDecoration.push("lineThrough");break;case "noLineThrough":
            b.textDecoration.includes("lineThrough") && ob(b.textDecoration, "lineThrough");break;case "overline":
            b.textDecoration.includes("overline") || b.textDecoration.push("overline");break;case "noOverline":
            b.textDecoration.includes("overline") && ob(b.textDecoration, "overline");}
      }
    }function Jl(b, c, d, e) {
      return (b = Ll(b, d, e)) ? b : sl(c, d, e);
    }function sl(b, c, d) {
      for (var e = rl(b), f = 0; f < e.length; f++) {
        var g = M.getAttributeNS(e[f], "http://www.w3.org/ns/ttml#styling", d);if (g) return g;
      }return (b = Hl(b, "style", c)) ? M.getAttributeNS(b, "http://www.w3.org/ns/ttml#styling", d) : null;
    }
    function Ll(b, c, d) {
      return (b = Hl(b, "style", c)) ? M.getAttributeNS(b, "http://www.w3.org/ns/ttml#styling", d) : null;
    }function Hl(b, c, d) {
      if (!b || 1 > d.length) return null;var e = null,
          f = b;for (b = null; f && !(b = f.getAttribute(c)) && (f = f.parentNode, f instanceof Element);) {}if (c = b) for (b = 0; b < d.length; b++) {
        if (d[b].getAttribute("xml:id") == c) {
          e = d[b];break;
        }
      }return e;
    }
    function Gl(b, c) {
      var d = null;if (xl.test(b)) {
        d = xl.exec(b);var e = Number(d[1]),
            f = Number(d[2]),
            g = Number(d[3]),
            h = Number(d[4]);h += (Number(d[5]) || 0) / c.b;g += h / c.frameRate;d = g + 60 * f + 3600 * e;
      } else yl.test(b) ? d = Ml(yl, b) : zl.test(b) ? d = Ml(zl, b) : Al.test(b) ? (d = Al.exec(b), d = Number(d[1]) / c.frameRate) : Bl.test(b) ? (d = Bl.exec(b), d = Number(d[1]) / c.a) : Cl.test(b) && (d = Ml(Cl, b));return d;
    }
    function Ml(b, c) {
      var d = b.exec(c);return null == d || "" == d[0] ? null : (Number(d[4]) || 0) / 1E3 + (Number(d[3]) || 0) + 60 * (Number(d[2]) || 0) + 3600 * (Number(d[1]) || 0);
    }function ql(b, c, d, e) {
      this.frameRate = Number(b) || 30;this.b = Number(c) || 1;this.a = Number(e);0 == this.a && (this.a = b ? this.frameRate * this.b : 1);d && (b = /^(\d+) (\d+)$/g.exec(d)) && (this.frameRate *= b[1] / b[2]);
    }md["application/ttml+xml"] = pl;function Nl() {
      this.a = new pl();
    }Nl.prototype.parseInit = function (b) {
      var c = !1;new S().F("moov", T).F("trak", T).F("mdia", T).F("minf", T).F("stbl", T).$("stsd", Fe).F("stpp", function (b) {
        c = !0;b.parser.stop();
      }).parse(b);if (!c) throw new A(2, 2, 2007);
    };Nl.prototype.parseMedia = function (b, c) {
      var d = !1,
          e = [];new S().F("mdat", Ge(function (b) {
        d = !0;e = e.concat(this.a.parseMedia(b, c));
      }.bind(this))).parse(b);if (!d) throw new A(2, 2, 2007);return e;
    };md['application/mp4; codecs="stpp"'] = Nl;
    md['application/mp4; codecs="stpp.TTML.im1t"'] = Nl;function Ol() {}Ol.prototype.parseInit = function () {};
    Ol.prototype.parseMedia = function (b, c) {
      var d = Ob(b);d = d.replace(/\r\n|\r(?=[^\n]|$)/gm, "\n");d = d.split(/\n{2,}/m);if (!/^WEBVTT($|[ \t\n])/m.test(d[0])) throw new A(2, 2, 2E3);var e = c.segmentStart;if (null == e && (e = 0, d[0].includes("X-TIMESTAMP-MAP"))) {
        var f = d[0].match(/LOCAL:((?:(\d{1,}):)?(\d{2}):(\d{2})\.(\d{3}))/m),
            g = d[0].match(/MPEGTS:(\d+)/m);f && g && (e = Pl(new Jf(f[1])), e = c.periodStart + (Number(g[1]) / 9E4 - e));
      }g = [];var h = d[0].split("\n");for (f = 1; f < h.length; f++) {
        if (/^Region:/.test(h[f])) {
          var k = new Jf(h[f]),
              l = new Pc();Mf(k);Kf(k);for (var m = Mf(k); m;) {
            var p = l,
                t = m;(m = /^id=(.*)$/.exec(t)) ? p.id = m[1] : (m = /^width=(\d{1,2}|100)%$/.exec(t)) ? p.width = Number(m[1]) : (m = /^lines=(\d+)$/.exec(t)) ? (p.height = Number(m[1]), p.heightUnits = 2) : (m = /^regionanchor=(\d{1,2}|100)%,(\d{1,2}|100)%$/.exec(t)) ? (p.regionAnchorX = Number(m[1]), p.regionAnchorY = Number(m[2])) : (m = /^viewportanchor=(\d{1,2}|100)%,(\d{1,2}|100)%$/.exec(t)) ? (p.viewportAnchorX = Number(m[1]), p.viewportAnchorY = Number(m[2])) : /^scroll=up$/.exec(t) && (p.scroll = "up");Kf(k);
            m = Mf(k);
          }g.push(l);
        }
      }f = [];for (k = 1; k < d.length; k++) {
        h = d[k].split("\n");m = h;t = e;h = g;if (1 == m.length && !m[0] || /^NOTE($|[ \t])/.test(m[0]) || "STYLE" == m[0]) h = null;else {
          l = null;m[0].includes("--\x3e") || (l = m[0], m.splice(0, 1));p = new Jf(m[0]);var w = Pl(p),
              x = Lf(p, /[ \t]+--\x3e[ \t]+/g),
              B = Pl(p);if (null == w || null == x || null == B) throw new A(2, 2, 2001);m = new Oc(w + t, B + t, m.slice(1).join("\n").trim());Kf(p);for (t = Mf(p); t;) {
            Ql(m, t, h), Kf(p), t = Mf(p);
          }null != l && (m.id = l);h = m;
        }h && f.push(h);
      }return f;
    };
    function Ql(b, c, d) {
      var e;if (e = /^align:(start|middle|center|end|left|right)$/.exec(c)) c = e[1], "middle" == c ? b.textAlign = Rc : b.textAlign = Yc[c.toUpperCase()];else if (e = /^vertical:(lr|rl)$/.exec(c)) b.writingDirection = "lr" == e[1] ? 2 : 3;else if (e = /^size:([\d.]+)%$/.exec(c)) b.size = Number(e[1]);else if (e = /^position:([\d.]+)%(?:,(line-left|line-right|center|start|end))?$/.exec(c)) b.position = Number(e[1]), e[2] && (c = e[2], b.positionAlign = "line-left" == c || "start" == c ? "line-left" : "line-right" == c || "end" == c ? "line-right" : "center");else if (e = /^region:(.*)$/.exec(c)) {
        if (c = Rl(d, e[1])) b.region = c;
      } else if (d = /^line:([\d.]+)%(?:,(start|end|center))?$/.exec(c)) b.lineInterpretation = 1, b.line = Number(d[1]), d[2] && (b.lineAlign = $c[d[2].toUpperCase()]);else if (d = /^line:(-?\d+)(?:,(start|end|center))?$/.exec(c)) b.lineInterpretation = Tc, b.line = Number(d[1]), d[2] && (b.lineAlign = $c[d[2].toUpperCase()]);
    }function Rl(b, c) {
      var d = b.filter(function (b) {
        return b.id == c;
      });return d.length ? d[0] : null;
    }
    function Pl(b) {
      b = Lf(b, /(?:(\d{1,}):)?(\d{2}):(\d{2})\.(\d{3})/g);if (null == b) return null;var c = Number(b[2]),
          d = Number(b[3]);return 59 < c || 59 < d ? null : Number(b[4]) / 1E3 + d + 60 * c + 3600 * (Number(b[1]) || 0);
    }md["text/vtt"] = Ol;md['text/vtt; codecs="vtt"'] = Ol;function Sl() {
      this.a = null;
    }Sl.prototype.parseInit = function (b) {
      var c = !1;new S().F("moov", T).F("trak", T).F("mdia", T).$("mdhd", function (b) {
        0 == b.version ? (b.reader.I(4), b.reader.I(4), this.a = b.reader.C(), b.reader.I(4)) : (b.reader.I(8), b.reader.I(8), this.a = b.reader.C(), b.reader.I(8));b.reader.I(4);
      }.bind(this)).F("minf", T).F("stbl", T).$("stsd", Fe).F("wvtt", function () {
        c = !0;
      }).parse(b);if (!this.a) throw new A(2, 2, 2008);if (!c) throw new A(2, 2, 2008);
    };
    Sl.prototype.parseMedia = function (b, c) {
      var d = this;if (!this.a) throw new A(2, 2, 2008);var e = 0,
          f = [],
          g,
          h = [],
          k = !1,
          l = !1,
          m = !1,
          p = null;new S().F("moof", T).F("traf", T).$("tfdt", function (b) {
        k = !0;e = 0 == b.version ? b.reader.C() : b.reader.$a();
      }).$("tfhd", function (b) {
        var c = b.flags;b = b.reader;b.I(4);c & 1 && b.I(8);c & 2 && b.I(4);p = c & 8 ? b.C() : null;
      }).$("trun", function (b) {
        l = !0;var c = b.version,
            d = b.flags;b = b.reader;var e = b.C();d & 1 && b.I(4);d & 4 && b.I(4);for (var g = [], h = 0; h < e; h++) {
          var k = { duration: null, sampleSize: null, Fc: null };d & 256 && (k.duration = b.C());d & 512 && (k.sampleSize = b.C());d & 1024 && b.I(4);d & 2048 && (k.Fc = 0 == c ? b.C() : b.ud());g.push(k);
        }f = g;
      }).F("mdat", Ge(function (b) {
        m = !0;g = b;
      })).parse(b);if (!m && !k && !l) throw new A(2, 2, 2008);var t = e,
          w = new DataView(g.buffer, g.byteOffset, g.byteLength),
          x = new P(w, 0);f.forEach(function (b) {
        var f = b.duration || p,
            g = b.Fc ? e + b.Fc : t;t = g + (f || 0);var k = 0;do {
          var l = x.C();k += l;var m = x.C(),
              w = null;"vttc" == He(m) ? 8 < l && (w = x.Ja(l - 8)) : x.I(l - 8);f && w && h.push(Tl(w, c.periodStart + g / d.a, c.periodStart + t / d.a));
        } while (b.sampleSize && k < b.sampleSize);
      });
      return h.filter(H.va);
    };function Tl(b, c, d) {
      var e, f, g;new S().F("payl", Ge(function (b) {
        e = Ob(b);
      })).F("iden", Ge(function (b) {
        f = Ob(b);
      })).F("sttg", Ge(function (b) {
        g = Ob(b);
      })).parse(b);return e ? Ul(e, f, g, c, d) : null;
    }function Ul(b, c, d, e, f) {
      b = new Oc(e, f, b);c && (b.id = c);if (d) for (c = new Jf(d), d = Mf(c); d;) {
        Ql(b, d, []), Kf(c), d = Mf(c);
      }return b;
    }md['application/mp4; codecs="wvtt"'] = Sl;
  }).call(exportTo, innerGlobal, innerGlobal);if (true) for (var k in exportTo.shaka) {
    exports[k] = exportTo.shaka[k];
  } else if (typeof define != "undefined" && define.amd) define(function () {
    return exportTo.shaka;
  });else innerGlobal.shaka = exportTo.shaka;
})();

//# sourceMappingURL=shaka-player.compiled.map
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(5)))

/***/ }),

/***/ 5:
/***/ (function(module, exports) {

var g;

// This works in non-strict mode
g = (function() {
	return this;
})();

try {
	// This works if eval is allowed (see CSP)
	g = g || Function("return this")() || (1,eval)("this");
} catch(e) {
	// This works if the window reference is available
	if(typeof window === "object")
		g = window;
}

// g can still be undefined, but nothing to do about it...
// We return undefined, instead of nothing here, so it's
// easier to handle this case. if(!global) { ...}

module.exports = g;


/***/ })

/******/ });