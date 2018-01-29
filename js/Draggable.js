/*
Copyright (c) 2007, NAKAMURA Satoru
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are met:

    * Redistributions of source code must retain the above copyright notice,
      this list of conditions and the following disclaimer.
    * Redistributions in binary form must reproduce the above copyright notice,
      this list of conditions and the following disclaimer in the documentation
      and/or other materials provided with the distribution.
    * Neither the name of the NAKAMURA Satoru nor the names of its contributors
      may be used to endorse or promote products derived from this
      software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*/
/*
 * Draggable
 *
 * @website http://clonedoppelganger.net/
 * @version 0.0.2
 */
/*
Example:
[CSS]--------------------------------------------
#element_id {
  position: absolute;
  top: 10px;
  left: 35px;
  width: 150px;
  height: 100px;
  background-color: #00b;
  cursor: move;
}
[HTML]-------------------------------------------
<div id="element_id"></div>
[JavaScript]-------------------------------------
var draggable = new Draggable("element_id");
-------------------------------------------------
*/

/**
 * Constructor
 * @param {String|Element} element - element id or element object
 */
var Draggable = function(element) {
  this.initialize(element);
}
var onmouseupevents= [];
window.onload = function () {
  Array.from(document.getElementsByClassName("bouton")).forEach( function(bouton) {
    onmouseupevents.push(bouton.getAttribute('onmouseup'));
    bouton.removeAttribute('onmouseup');
  })
}

/**
 * remove EventListeners
 */
Draggable.prototype.destroy = function() {
  this.detach(this.element, "mousedown", this.observers["mousedown"]);
  this.detach(this.html, "mouseup", this.observers["mouseup"]);
  this.detach(this.html, "mousemove", this.observers["mousemove"]);
}

Draggable.prototype.initialize = function(element) {
  this.isIE = navigator.appVersion.lastIndexOf("MSIE") > 0;
  this.isFF = navigator.userAgent.toLowerCase().indexOf("firefox") > 0;
  this.html = document.getElementsByTagName("html").item(0);
  if (typeof element == "string") {
    this.element = document.getElementById(element);
  } else {
    this.element = element;
  }
  this.style = this.element.style;
  this.thisBaseX;
  this.thisBaseY;
  this.pageBaseX;
  this.pageBaseY;
  this.scrollBaseY;
  this.isMoving = false;
  this.observers = {};
  var self = this;
  // Mousedown
  this.observers["mousedown"] = this.observe(this.element, "mousedown", function(event) {
    if (self.isMoving) return;
    event = event || window.event;
    self.disableSelect(event);
    var position = self.getPosition();
    self.thisBaseX = position["x"];
    self.pageBaseX = event.pageX || event.clientX;
    self.globalX = (event.pageX || event.clientX) - self.pageBaseX + self.thisBaseX;
    console.log(self.globalX);
    if (self.isIE) self.scrollBaseY = document.body.scrollTop;
    self.isMoving = true;
  });
  // Mousemove
  this.observers["mousemove"] = this.observe(this.element, "mousemove", function(event) {
    if (!self.isMoving) return;
    event = event || window.event;
    var x = (event.pageX || event.clientX) - self.pageBaseX + self.thisBaseX;
    if (Math.abs(self.globalX-x)<4) return;
    this.style.cursor = "-webkit-grabbing";
    this.style.cursor = "-moz-grabbing";
    Array.from(this.getElementsByClassName("bouton")).forEach( function(bouton) {
      bouton.style.cursor = "inherit";
      bouton.removeAttribute('onmouseup');
    })
    if (x>0) {
      self.setPosition(0, 0);
    }
    else if (-x>(this.offsetWidth-window.innerWidth)) {
      self.setPosition(-this.offsetWidth+window.innerWidth, 0)
    }
    else {
      self.setPosition(x, 0);
    }
  });
  // Mouseup
  this.observers["mouseup"] = this.observe(this.element, "mouseup", function(event) {
    this.style.cursor = "-webkit-grab";
    this.style.cursor = "-moz-grab";
    var i = 0;
    Array.from(this.getElementsByClassName("bouton")).forEach( function(bouton) {
      bouton.style.cursor = "pointer";
      bouton.setAttribute('onmouseup', onmouseupevents[i]);
      i++;
    })
  });
  this.observers["mouseup"] = this.observe(this.html, "mouseup", function(event) {
    if (!self.isMoving) return;
    self.enableSelect();
    self.isMoving = false;
  });
}

Draggable.prototype.observe = function(element, name, observer) {
  if (element.addEventListener) {
    element.addEventListener(name, observer, false);
  } else if (element.attachEvent) {
    element.attachEvent("on" + name, observer);
  }
  return observer;
}

Draggable.prototype.detach = function(element, name, observer) {
  if (element.removeEventListener) {
    element.removeEventListener(name, observer, false);
  } else if (element.detachEvent) {
    try {
      element.detachEvent("on" + name, observer);
    } catch (e) {}
  }
}

Draggable.prototype.setPosition = function(x, y) {
  this.style.left = x + "px";
  this.style.top =  "0px";
}

Draggable.prototype.getPosition = function() {
  var x, y;
  // First you acquire from css style information.
  if (this.style.top == "" || this.style.left == "") {
    if (this.element.currentStyle) {
      x = this.element.currentStyle["left"];
      y = this.element.currentStyle["top"];
    } else {
      var computedStyle = document.defaultView.getComputedStyle(this.element, null);
      x = computedStyle["left"];
      y = computedStyle["top"];
    }
  } else {
    x = this.style.left;
    y = this.style.top;
  }
  return {"x": parseInt(x.replace("px", "")) || 0, "y": 0};
}

Draggable.prototype.disableSelect = function(event) {
  if (this.isIE) {
    document.getElementsByTagName("body").item(0).onselectstart = function(e){ return false };
  } else {
    try { event.preventDefault(); } catch(e) {}
  }
}

Draggable.prototype.enableSelect = function() {
  if (this.isIE) document.getElementsByTagName("body").item(0).onselectstart = "";
}
