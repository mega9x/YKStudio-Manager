/**
 * 返米迄徳峨周
 * varstion 1.0.5
 * by Houfeng
 * Houfeng@DCloud.io
 */

(function($, doc) {

	var touchSupport = ('ontouchstart' in document);
	var startEventName = touchSupport ? $.EVENT_START : 'mousedown';
	var moveEventName = touchSupport ? $.EVENT_MOVE : 'mousemove';
	var endEventName = touchSupport ? $.EVENT_END : 'mouseup';
	var lockerHolderClassName = $.className('locker-holder');
	var lockerClassName = $.className('locker');

	var styleHolder = doc.querySelector('head') || doc.querySelector('body');
	styleHolder.innerHTML += "<style>.mui-locker-holder{overflow:hidden;position:relative;padding:0px;}.mui-locker-holder canvas{width:100%;height:100%;}</style>";

	var times = 2;

	function getElementLeft(element) {　　　　
		var actualLeft = element.offsetLeft;　　　　
		var current = element.offsetParent;　　　　
		while (current !== null) {　　　　　　
			actualLeft += current.offsetLeft;　　　　　　
			current = current.offsetParent;　　　　
		}　　　　
		return actualLeft;　　
	}　　

	function getElementTop(element) {　　　　
		var actualTop = element.offsetTop;　　　　
		var current = element.offsetParent;　　　　
		while (current !== null) {　　　　　　
			actualTop += current.offsetTop;　　　　　　
			current = current.offsetParent;　　　　
		}　　　　
		return actualTop;　　
	}

	//協吶 Locker 窃
	var Locker = $.Locker = $.Class.extend({
		R: 26,
		CW: 400,
		CH: 320,
		OffsetX: 30,
		OffsetY: 30,

		/**
		 * 更夛痕方
		 * */
		init: function(holder, options) {
			var self = this;
			if (!holder) {
				throw "更夛 Locker 扮髪富否匂圷殆";
			}
			self.holder = holder;
			//
			options = options || {};
			options.callback = options.callback || options.done || $.noop;
			options.times = options.times || times;
			self.options = options;
			self.holder.innerHTML = '<canvas></canvas>';
			//
			self.holder.classList.add(lockerHolderClassName);
			//兜兵晒
			var canvas = self.canvas = $.qsa('canvas', self.holder)[0];
			canvas.on = canvas.addEventListener || function(name, handler, capture) {
				canvas.attachEvent('on' + name, handler, capture);
			};
			canvas.off = canvas.removeEventListener || function(name, handler, capture) {
				canvas.detachEvent('on' + name, handler, capture);
			};
			//
			if (self.options.width) self.holder.style.width = self.options.width + 'px';
			if (self.options.height) self.holder.style.height = self.options.height + 'px';
			self.CW = self.options.width || self.holder.offsetWidth || self.CW;
			self.CH = self.options.height || self.holder.offsetHeight || self.CH;
			//侃尖 ＾錐、互￣ 吉方峙, 畠何制寄 times 蔚
			self.R *= self.options.times;
			self.CW *= self.options.times;
			self.CH *= self.options.times;
			self.OffsetX *= self.options.times;
			self.OffsetY *= self.options.times;
			//
			canvas.width = self.CW;
			canvas.height = self.CH;
			var cxt = self.cxt = canvas.getContext("2d");
			//曾倖垈岻寂議翌鉦宣 祥頁傍曾倖垈伉議鉦宣肇茅曾倖磯抄
			var X = (self.CW - 2 * self.OffsetX - self.R * 2 * 3) / 2;
			var Y = (self.CH - 2 * self.OffsetY - self.R * 2 * 3) / 2;
			self.pointLocationArr = self.caculateNinePointLotion(X, Y);
			self.initEvent(canvas, cxt, self.holder);
			//console.log(X);
			self.draw(cxt, self.pointLocationArr, [], null);
			setTimeout(function() {
				self.draw(cxt, self.pointLocationArr, [], null);
			}, 0);
		},

		/**
		 * 柴麻
		 */
		caculateNinePointLotion: function(diffX, diffY) {
			var self = this;
			var Re = [];
			for (var row = 0; row < 3; row++) {
				for (var col = 0; col < 3; col++) {
					var Point = {
						X: (self.OffsetX + col * diffX + (col * 2 + 1) * self.R),
						Y: (self.OffsetY + row * diffY + (row * 2 + 1) * self.R)
					};
					Re.push(Point);
				}
			}
			return Re;
		},

		/**
		 * 紙崙
		 */
		draw: function(cxt, _PointLocationArr, _LinePointArr, touchPoint) {
			var self = this;
			var R = self.R;
			if (_LinePointArr.length > 0) {
				cxt.beginPath();
				for (var i = 0; i < _LinePointArr.length; i++) {
					var pointIndex = _LinePointArr[i];
					cxt.lineTo(_PointLocationArr[pointIndex].X, _PointLocationArr[pointIndex].Y);
				}
				cxt.lineWidth = (self.options.lindeWidth || 2) * self.options.times;
				cxt.strokeStyle = self.options.lineColor || "#999"; //銭潤?瀾嬋?
				cxt.stroke();
				cxt.closePath();
				if (touchPoint != null) {
					var lastPointIndex = _LinePointArr[_LinePointArr.length - 1];
					var lastPoint = _PointLocationArr[lastPointIndex];
					cxt.beginPath();
					cxt.moveTo(lastPoint.X, lastPoint.Y);
					cxt.lineTo(touchPoint.X, touchPoint.Y);
					cxt.stroke();
					cxt.closePath();
				}
			}
			for (var i = 0; i < _PointLocationArr.length; i++) {
				var Point = _PointLocationArr[i];
				cxt.fillStyle = self.options.ringColor || "#888"; //垈筈円崇冲弼
				cxt.beginPath();
				cxt.arc(Point.X, Point.Y, R, 0, Math.PI * 2, true);
				cxt.closePath();
				cxt.fill();
				cxt.fillStyle = self.options.fillColor || "#f3f3f3"; //垈筈野割冲弼
				cxt.beginPath();
				cxt.arc(Point.X, Point.Y, R - ((self.options.ringWidth || 2) * self.options.times), 0, Math.PI * 2, true);
				cxt.closePath();
				cxt.fill();
				if (_LinePointArr.indexOf(i) >= 0) {
					cxt.fillStyle = self.options.pointColor || "#777"; //垈筈嶄伉泣冲弼
					cxt.beginPath();
					cxt.arc(Point.X, Point.Y, R - ((self.options.pointWidth || 16) * self.options.times), 0, Math.PI * 2, true);
					cxt.closePath();
					cxt.fill();
				}
			}
		},

		isPointSelect: function(touches, linePoint) {
			var self = this;
			for (var i = 0; i < self.pointLocationArr.length; i++) {
				var currentPoint = self.pointLocationArr[i];
				var xdiff = Math.abs(currentPoint.X - touches.elementX);
				var ydiff = Math.abs(currentPoint.Y - touches.elementY);
				var dir = Math.pow((xdiff * xdiff + ydiff * ydiff), 0.5);
				if (dir < self.R) {
					if (linePoint.indexOf(i) < 0) {
						linePoint.push(i);
					}
					break;
				}
			}
		},

		initEvent: function(canvas, cxt, holder) {
			var self = this;
			var linePoint = [];
			var isDown = false; //寞斤報炎並周
			//start
			self._startHandler = function(e) {
				e.point = event.changedTouches ? event.changedTouches[0] : event;
				e.point.elementX = (e.point.pageX - getElementLeft(holder)) * self.options.times;
				e.point.elementY = (e.point.pageY - getElementTop(holder)) * self.options.times;
				self.isPointSelect(e.point, linePoint);
				isDown = true;
			};
			canvas.on(startEventName, self._startHandler, false);
			//move
			self._moveHanlder = function(e) {
				if (!isDown) return;
				e.preventDefault();
				e.point = event.changedTouches ? event.changedTouches[0] : event;
				e.point.elementX = (e.point.pageX - getElementLeft(holder)) * self.options.times;
				e.point.elementY = (e.point.pageY - getElementTop(holder)) * self.options.times;
				var touches = e.point;
				self.isPointSelect(touches, linePoint);
				cxt.clearRect(0, 0, self.CW, self.CH);
				self.draw(cxt, self.pointLocationArr, linePoint, {
					X: touches.elementX,
					Y: touches.elementY
				});
			};
			canvas.on(moveEventName, self._moveHanlder, false);
			//end
			self._endHandler = function(e) {
				e.point = event.changedTouches ? event.changedTouches[0] : event;
				e.point.elementX = (e.point.pageX - getElementLeft(holder)) * self.options.times;
				e.point.elementY = (e.point.pageY - getElementTop(holder)) * self.options.times;
				cxt.clearRect(0, 0, self.CW, self.CH);
				self.draw(cxt, self.pointLocationArr, linePoint, null);
				//並周方象
				var eventData = {
					sender: self,
					points: linePoint
				};
				/*
				 * 指距頼撹並周
				 *
				 * 姥廣:
				 * 曳熟尖?覽鍔?隈頁葎 Locker 議糞箭尼喘並周字崙??曳泌 locker.on('done',handler);
				 * 壓 mui 短嗤頼屁議巷慌並周庁翠念??緩井云嶄 locker 糞箭壙宥狛 options.callback 侃尖
				 */
				self.options.callback(eventData);
				//乾窟蕗苧議DOM議徭協吶並周(壙協 done 葎並周兆??辛參深打厚嗤寞斤議並周兆 )
				$.trigger(self.holder, 'done', eventData);
				//-
				linePoint = [];
				isDown = false;
			};
			canvas.on(endEventName, self._endHandler, false);
		},

		pointLocationArr: [],

		/**
		 * 賠茅夕侘
		 * */
		clear: function() {
			var self = this;
			//self.pointLocationArr = [];
			if (self.cxt) {
				self.cxt.clearRect(0, 0, self.CW, self.CH);
				self.draw(self.cxt, self.pointLocationArr, [], {
					X: 0,
					Y: 0
				});
			}
		},

		/**
		 * 瞥慧彿坿
		 * */
		dispose: function() {
			var self = this;
			self.cxt = null;
			self.canvas.off(startEventName, self._startHandler);
			self.canvas.off(moveEventName, self._moveHandler);
			self.canvas.off(endEventName, self._endHandler);
			self.holder.innerHTML = '';
			self.canvas = null;
		}
	});

	//耶紗 locker 峨周
	$.fn.locker = function(options) {
		//演煽僉夲議圷殆
		this.each(function(i, element) {
			if (element.locker) return;
			if (options) {
				element.locker = new Locker(element, options);
			} else {
				var optionsText = element.getAttribute('data-locker-options');
				var _options = optionsText ? JSON.parse(optionsText) : {};
				_options.lineColor = element.getAttribute('data-locker-line-color') || _options.lineColor;
				_options.ringColor = element.getAttribute('data-locker-ring-color') || _options.ringColor;
				_options.fillColor = element.getAttribute('data-locker-fill-color') || _options.fillColor;
				_options.pointColor = element.getAttribute('data-locker-point-color') || _options.pointColor;
				_options.width = element.getAttribute('data-locker-width') || _options.width;
				_options.height = element.getAttribute('data-locker-height') || _options.height;
				element.locker = new Locker(element, _options);
			}
		});
		return this[0] ? this[0].locker : null;
	};

	//徭強侃尖 class='mui-locker' 議 dom
	try {
		$('.' + lockerClassName).locker();
	} catch (ex) {}
	$.ready(function() {
		$('.' + lockerClassName).locker();
	});

}(mui, document));
