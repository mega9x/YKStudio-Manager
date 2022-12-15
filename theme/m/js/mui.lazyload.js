(function($, window, document) {
	var mid = 0;
	$.Lazyload = $.Class.extend({
		init: function(element, options) {
			var self = this;
			this.container = this.element = element;
//			placeholder //Ĭ��ͼƬ
			this.options = $.extend({
				selector: '',//��ѯ��ЩԪ����Ҫlazyload
				diff: false,//�����Ӵ��ײ��������س���lazyload
				force: false,//ǿ�Ƽ���(����Ԫ���Ƿ������Ӵ���)
				autoDestroy: true,//Ԫ�ؼ�������Ƿ��Զ����ٵ�ǰ�������
				duration: 100//����ֹͣ��ú�ʼ����
			}, options);

			this._key = 0;
			this._containerIsNotDocument = this.container.nodeType !== 9;
			this._callbacks = {};

			this._init();
		},
		_init: function() {
			this._initLoadFn();

			this.addElements();

			this._loadFn();

			$.ready(function() {
				this._loadFn();
			}.bind(this));

			this.resume();
		},
		_initLoadFn: function() {
			var self = this;
			self._loadFn = this._buffer(function() { // �����ӳ���
				if (self.options.autoDestroy && self._counter == 0 && $.isEmptyObject(self._callbacks)) {
					self.destroy();
				}
				self._loadItems();
			}, self.options.duration, self);
		},
		/**
		 *���ݼ��غ���ʵ�ּ�����
		 *@param {Function} load ���غ���
		 *@returns {Function} ������
		 */
		_createLoader: function(load) {
			var value, loading, handles = [],
				h;
			return function(handle) {
				if (!loading) {
					loading = true;
					load(function(v) {
						value = v;
						while (h = handles.shift()) {
							try {
								h && h.apply(null, [value]);
							} catch (e) {
								setTimeout(function() {
									throw e;
								}, 0)
							}
						}
					})
				}
				if (value) {
					handle && handle.apply(null, [value]);
					return value;
				}
				handle && handles.push(handle);
				return value;
			}
		},
		_buffer: function(fn, ms, context) {
			var timer;
			var lastStart = 0;
			var lastEnd = 0;
			var ms = ms || 150;

			function run() {
				if (timer) {
					timer.cancel();
					timer = 0;
				}
				lastStart = $.now();
				fn.apply(context || this, arguments);
				lastEnd = $.now();
			}

			return $.extend(function() {
				if (
					(!lastStart) || // ��δ���й�
					(lastEnd >= lastStart && $.now() - lastEnd > ms) || // �ϴ����гɹ����Ѿ�����ms����
					(lastEnd < lastStart && $.now() - lastStart > ms * 8) // �ϴ����л�δ��ɣ���8*ms����
				) {
					run();
				} else {
					if (timer) {
						timer.cancel();
					}
					timer = $.later(run, ms, null, arguments);
				}
			}, {
				stop: function() {
					if (timer) {
						timer.cancel();
						timer = 0;
					}
				}
			});
		},
		_getBoundingRect: function(c) {
			var vh, vw, left, top;

			if (c !== undefined) {
				vh = c.offsetHeight;
				vw = c.offsetWidth;
				var offset = $.offset(c);
				left = offset.left;
				top = offset.top;
			} else {
				vh = window.innerHeight;
				vw = window.innerWidth;
				left = 0;
				top = window.pageYOffset;
			}

			var diff = this.options.diff;

			var diffX = diff === false ? vw : diff;
			var diffX0 = 0;
			var diffX1 = diffX;

			var diffY = diff === false ? vh : diff;
			var diffY0 = 0;
			var diffY1 = diffY;

			var right = left + vw;
			var bottom = top + vh;


			left -= diffX0;
			right += diffX1;
			top -= diffY0;
			bottom += diffY1;
			return {
				left: left,
				top: top,
				right: right,
				bottom: bottom
			};
		},
		_cacheWidth: function(el) {
			if (el._mui_lazy_width) {
				return el._mui_lazy_width;
			}
			return el._mui_lazy_width = el.offsetWidth;
		},
		_cacheHeight: function(el) {
			if (el._mui_lazy_height) {
				return el._mui_lazy_height;
			}
			return el._mui_lazy_height = el.offsetHeight;
		},
		_isCross: function(r1, r2) {
			var r = {};
			r.top = Math.max(r1.top, r2.top);
			r.bottom = Math.min(r1.bottom, r2.bottom);
			r.left = Math.max(r1.left, r2.left);
			r.right = Math.min(r1.right, r2.right);
			return r.bottom >= r.top && r.right >= r.left;
		},
		_elementInViewport: function(elem, windowRegion, containerRegion) {
			// display none or inside display none
			if (!elem.offsetWidth) {
				return false;
			}
			var elemOffset = $.offset(elem);
			var inContainer = true;
			var inWin;
			var left = elemOffset.left;
			var top = elemOffset.top;
			var elemRegion = {
				left: left,
				top: top,
				right: left + this._cacheWidth(elem),
				bottom: top + this._cacheHeight(elem)
			};

			inWin = this._isCross(windowRegion, elemRegion);

			if (inWin && containerRegion) {
				inContainer = this._isCross(containerRegion, elemRegion);
			}
			// ȷ���������ڳ���
			// �������Ӵ���Ҳ����
			return inContainer && inWin;
		},
		_loadItems: function() {
			var self = this;
			// container is display none
			if (self._containerIsNotDocument && !self.container.offsetWidth) {
				return;
			}
			self._windowRegion = self._getBoundingRect();

			if (self._containerIsNotDocument) {
				self._containerRegion = self._getBoundingRect(this.container);
			}
			$.each(self._callbacks, function(key, callback) {
				callback && self._loadItem(key, callback);
			});
		},
		_loadItem: function(key, callback) {
			var self = this;
			callback = callback || self._callbacks[key];
			if (!callback) {
				return true;
			}
			var el = callback.el;
			var remove = false;
			var fn = callback.fn;
			if (self.options.force || self._elementInViewport(el, self._windowRegion, self._containerRegion)) {
				try {
					remove = fn.call(self, el, key);
				} catch (e) {
					setTimeout(function() {
						throw e;
					}, 0);
				}
			}
			if (remove !== false) {
				delete self._callbacks[key];
			}
			return remove;
		},
		addCallback: function(el, fn) {
			var self = this;
			var callbacks = self._callbacks;
			var callback = {
				el: el,
				fn: fn || $.noop
			};
			var key = ++this._key;
			callbacks[key] = callback;

			// add ������⣬��ֹ����Ԫ������
			if (self._windowRegion) {
				self._loadItem(key, callback);
			} else {
				self.refresh();
			}
		},
		addElements: function(elements) {
			var self = this;
			self._counter = self._counter || 0;
			var lazyloads = [];
			if (!elements && self.options.selector) {
				lazyloads = self.container.querySelectorAll(self.options.selector);
			} else {
				$.each(elements, function(index, el) {
					lazyloads = lazyloads.concat($.qsa(self.options.selector, el));
				});
			}
			$.each(lazyloads, function(index, el) {
				if (!el.getAttribute('data-lazyload-id')) {
					if (self.addElement(el)) {
						el.setAttribute('data-lazyload-id', mid++);
						self.addCallback(el, self.handle);
					}
				}
			});
		},
		addElement: function(el) {
			return true;
		},
		handle: function() {
			//throw new Error('������ʵ��');
		},
		refresh: function(check) {
			if (check) { //����µ�lazyload
				this.addElements();
			}
			this._loadFn();
		},
		pause: function() {
			var load = this._loadFn;
			if (this._destroyed) {
				return;
			}
			window.removeEventListener('scroll', load);
			window.removeEventListener($.EVENT_MOVE, load);
			window.removeEventListener('resize', load);
			if (this._containerIsNotDocument) {
				this.container.removeEventListener('scrollend', load);
				this.container.removeEventListener('scroll', load);
				this.container.removeEventListener($.EVENT_MOVE, load);
			}
		},
		resume: function() {
			var load = this._loadFn;
			if (this._destroyed) {
				return;
			}
			window.addEventListener('scroll', load, false);
			window.addEventListener($.EVENT_MOVE, load, false);
			window.addEventListener('resize', load, false);
			if (this._containerIsNotDocument) {
				this.container.addEventListener('scrollend', load, false);
				this.container.addEventListener('scroll', load, false);
				this.container.addEventListener($.EVENT_MOVE, load, false);
			}
		},
		destroy: function() {
			var self = this;
			self.pause();
			self._callbacks = {};
			$.trigger(this.container, 'destroy', self);
			self._destroyed = 1;
		}
	});
})(mui, window, document);