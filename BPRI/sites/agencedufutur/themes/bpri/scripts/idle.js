// idle.js (c) Alexios Chouchoulas 2009
// Released under the terms of the GNU Public License version 2.0 (or later).
 
var _API_JQUERY = 1;
var _api;
 
var _idleTimeout = 30000;	// 30 seconds
var _awayTimeout = 600000;	// 10 minutes
 
var _idleNow = false;
var _idleTimestamp = null;
var _idleTimer = null;
var _awayNow = false;
var _awayTimestamp = null;
var _awayTimer = null;
 
function setIdleTimeout(ms)
{
    _idleTimeout = ms;
    _idleTimestamp = new Date().getTime() + ms;
    if (_idleTimer != null) {
	clearTimeout (_idleTimer);
    }
    _idleTimer = setTimeout(_makeIdle, ms + 50);
    //console.log('idle in ' + ms + ', tid = ' + _idleTimer);
}
 
function setAwayTimeout(ms)
{
    _awayTimeout = ms;
    _awayTimestamp = new Date().getTime() + ms;
    if (_awayTimer != null) {
	clearTimeout (_awayTimer);
    }
    _awayTimer = setTimeout(_makeAway, ms + 50);
    //console.log('away in ' + ms);
}
 
function _makeIdle()
{
    var t = new Date().getTime();
    if (t < _idleTimestamp) {
	//console.log('Not idle yet. Idle in ' + (_idleTimestamp - t + 50));
	_idleTimer = setTimeout(_makeIdle, _idleTimestamp - t + 50);
	return;
    }
    //console.log('** IDLE **');
    _idleNow = true;
 
    try {
	if (document.onIdle) document.onIdle();
    } catch (err) {
    }
}
 
function _makeAway()
{
    var t = new Date().getTime();
    if (t < _awayTimestamp) {
	//console.log('Not away yet. Away in ' + (_awayTimestamp - t + 50));
	_awayTimer = setTimeout(_makeAway, _awayTimestamp - t + 50);
	return;
    }
    //console.log('** AWAY **');
    _awayNow = true;
 
    try {
	if (document.onAway) document.onAway();
    } catch (err) {
    }
}
 
function _active(event)
{
    var t = new Date().getTime();
    _idleTimestamp = t + _idleTimeout;
    _awayTimestamp = t + _awayTimeout;
    //console.log('not idle.');
 
    if (_idleNow) {
	setIdleTimeout(_idleTimeout);
    }
 
    if (_awayNow) {
	setAwayTimeout(_awayTimeout);
    }
 
    try {
	//console.log('** BACK **');
	if ((_idleNow || _awayNow) && document.onBack) document.onBack(_idleNow, _awayNow);
    } catch (err) {
    }
 
    _idleNow = false;
    _awayNow = false;
}
 
function _initJQuery()
{
    _api = _API_JQUERY;
    var doc = jQuery(document);
    doc.ready(function(){
            doc.mousedown(_active);
			try {
                doc.touchstart(_active);
            } catch (err) { }
            try {
                doc.scroll(_active);
            } catch (err) { }
            try {
                doc.keydown(_active);
            } catch (err) { }
            try {
                doc.click(_active);
            } catch (err) { }
            try {
                doc.dblclick(_active);
            } catch (err) { }
        });
}

_initJQuery();
