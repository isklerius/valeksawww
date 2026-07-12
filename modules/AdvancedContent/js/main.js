/**
 * CalendarView for jQuery by Alex Ganov (modified by NaN)
 *
 * Based on CalendarView for Prototype http://calendarview.org/ which is based
 * on Dynarch DHTML Calendar http://www.dynarch.com/projects/calendar/old/.
 *
 * CalendarView is licensed under the terms of the GNU Lesser General
 * Public License (LGPL)
 *
 * Usage:
 *   jQuery(document).ready(function() {
 *     $('#date_input').calendar();
 *   }
 *
 *   jQuery(document).ready(function() {
 *     $('#date_input').calendar({triggerElement: '#date_input_trigger'});
 *   }
 *
 *   jQuery(document).ready(function() {
 *     $('#date_input').calendar({parentElement: '#calendar_container'});
 *   }
 *
 * Default options:
 *   triggerElement: null, // Popup calendar
 *   parentElement: null, // Inline calendar
 *   minYear: 1900,
 *   maxYear: 2100,
 *   firstDayOfWeek: 1, // Monday
 *   weekend: "0,6", // Sunday and Saturday
 *   dateFormat: '%Y-%m-%d',
 *   selectHandler: null, // Will use default select handler
 *   closeHandler: null // Will use default close handler
 */
;(function($) {
	var Calendar = function() {
		this.date = new Date();
	};

	//------------------------------------------------------------------------------
	// Constants
	//------------------------------------------------------------------------------

	Calendar.VERSION = '1.2';
	Calendar.TODAY = 'Today';

	Calendar.DAY_NAMES = new Array(
		'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'
	);

	Calendar.SHORT_DAY_NAMES = new Array('Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa');

	Calendar.MONTH_NAMES = new Array(
		'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August',
		'September', 'October', 'November', 'December'
	);

	Calendar.SHORT_MONTH_NAMES = new Array(
		'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
	);

	Calendar.NAV_PREVIOUS_YEAR  = -2;
	Calendar.NAV_PREVIOUS_MONTH = -1;
	Calendar.NAV_TODAY          =  0;
	Calendar.NAV_NEXT_MONTH     =  1;
	Calendar.NAV_NEXT_YEAR      =  2;

	//------------------------------------------------------------------------------
	// Static Methods
	//------------------------------------------------------------------------------

	/**
	 * This gets called when the user presses a mouse button anywhere in the
	 * document, if the calendar is shown. If the click was outside the open
	 * calendar this function closes it.
	 *
	 * @param event
	 */
	Calendar._checkCalendar = function(event) {
		if (!window._popupCalendar) {
			return false;
		}

		if ($(event.target).parents().index($(window._popupCalendar.container)) >= 0) {
			return false;
		}

		window._popupCalendar.callCloseHandler();
		return event.preventDefault();
	}

	/**
	 * Event Handlers
	 * @param event
	 */
	Calendar.handleMouseDownEvent = function(event){
		$(document).mouseup(Calendar.handleMouseUpEvent);
		event.preventDefault();
	}

	/**
	 * Clicks of different actions
	 * @param event
	 */
	Calendar.handleMouseUpEvent = function(event) {
		var el        = event.target;
		var calendar  = el.calendar;
		var isNewDate = false;

		// If the element that was clicked on does not have an associated Calendar
		// object, return as we have nothing to do.
		if (!calendar) return false;

		// Clicked on a day
		if (typeof el.navAction == 'undefined') {
			if (calendar.currentDateElement) {
				calendar.currentDateElement.removeClass('selected');
				$(el).addClass('selected');
				calendar.shouldClose = (calendar.currentDateElement == $(el));
				if (!calendar.shouldClose) {
					calendar.currentDateElement = $(el);
				}
			}
			calendar.date.setDateOnly(el.date);
			isNewDate = true;
			calendar.shouldClose = !$(el).hasClass('otherDay');
			var isOtherMonth     = !calendar.shouldClose;
			if (isOtherMonth) {
				calendar.update(calendar.date);
			}
		} else {
			// Clicked on an action button
			var date = new Date(calendar.date);

			if (el.navAction == Calendar.NAV_TODAY) {
				date.setDateOnly(new Date());
			}

			var year = date.getFullYear();
			var mon = date.getMonth();
			function setMonth(m) {
				var day = date.getDate();
				var max = date.getMonthDays(m);
				if (day > max) date.setDate(max)
					date.setMonth(m);
			}
			switch (el.navAction) {

				// Previous Year
				case Calendar.NAV_PREVIOUS_YEAR:
					if (year > calendar.minYear)
						date.setFullYear(year - 1);
					break;

				// Previous Month
				case Calendar.NAV_PREVIOUS_MONTH:
					if (mon > 0) {
						setMonth(mon - 1);
					}
					else if (year-- > calendar.minYear) {
						date.setFullYear(year);
						setMonth(11);
					}
					break;

				// Today
				case Calendar.NAV_TODAY:
					break;

				// Next Month
				case Calendar.NAV_NEXT_MONTH:
					if (mon < 11) {
						setMonth(mon + 1);
					}
					else if (year < calendar.maxYear) {
						date.setFullYear(year + 1);
						setMonth(0);
					}
					break;

				// Next Year
				case Calendar.NAV_NEXT_YEAR:
					if (year < calendar.maxYear)
						date.setFullYear(year + 1);
					break;

			}

			if (!date.equalsTo(calendar.date)) {
				calendar.shouldClose = false;
				calendar.setDate(date);
				isNewDate = true;
			} else if (el.navAction == 0) {
				isNewDate = (calendar.shouldClose = true);
			}
		}

		if (isNewDate) event && calendar.callSelectHandler();
		if (calendar.shouldClose) event && calendar.callCloseHandler();
		$(document).unbind('mouseup', Calendar.handleMouseUpEvent);
		return event.preventDefault();
	};

	Calendar.defaultSelectHandler = function(calendar) {
		if (!calendar.dateField) {
			return false;
		}

		// Update dateField value
		(calendar.dateField.attr('tagName') == 'INPUT')
			? calendar.dateField.val(calendar.date.print(calendar.dateFormat))
			: calendar.dateField.html(calendar.date.print(calendar.dateFormat));

		// Trigger the onchange callback on the dateField, if one has been defined
		calendar.dateField.trigger('change');

		// Call the close handler, if necessary
		if (calendar.shouldClose) {
			calendar.callCloseHandler();
		}

		return true;
	}

	Calendar.defaultCloseHandler = function(calendar) {
		calendar.hide();
	}

	//------------------------------------------------------------------------------
	// Calendar Instance
	//------------------------------------------------------------------------------

	Calendar.prototype = {
		// The HTML Container Element
		container: null,

		// Dates
		date: null,
		currentDateElement: null,

		// Status
		shouldClose: false,
		isPopup: true,

		/**
		 * Update / (Re)initialize Calendar
		 * @param date
		 */
		update: function(date) {
			var calendar   = this;
			var today      = new Date();
			var thisYear   = today.getFullYear();
			var thisMonth  = today.getMonth();
			var thisDay    = today.getDate();
			var month      = date.getMonth();
			var dayOfMonth = date.getDate();

			// Ensure date is within the defined range
			if (date.getFullYear() < this.minYear) {
				date.setFullYear(this.minYear);
			} else if (date.getFullYear() > this.maxYear) {
				date.setFullYear(this.maxYear);
			}
			this.date = new Date(date);

			// Calculate the first day to display (including the previous month)
			date.setDate(1);
			var day1 = (date.getDay() - this.firstDayOfWeek) % 7;
			if (day1 < 0) day1 += 7;
			date.setDate(-day1);
			date.setDate(date.getDate() + 1);

			// Fill in the days of the month
			$('tbody tr', this.container).each(function() {
				var rowHasDays = false;
				$(this).children().each(function() {
					var day            = date.getDate();
					var dayOfWeek      = date.getDay();
					var isCurrentMonth = (date.getMonth() == month);

					// Reset classes on the cell
					cell = $(this);
					cell.removeAttr('class');
					cell[0].date = new Date(date);
					cell.html(day);

					// Account for days of the month other than the current month
					if (!isCurrentMonth) {
						cell.addClass('otherDay');
					} else {
						rowHasDays = true;
					}

					// Ensure the current day is selected
					if (isCurrentMonth && day == dayOfMonth) {
						cell.addClass('selected');
						calendar.currentDateElement = cell;
					}

					// Today
					if (date.getFullYear() == thisYear && date.getMonth() == thisMonth && day == thisDay) {
						cell.addClass('today');
					}

					// Weekend
					if (calendar.weekend.indexOf(dayOfWeek.toString()) != -1) {
						cell.addClass('weekend');
					}

					// Set the date to tommorrow
					date.setDate(day + 1);
				});
				// Hide the extra row if it contains only days from another month
				!rowHasDays ? $(this).hide() : $(this).show();
			});

			$('td.title', this.container).html(Calendar.MONTH_NAMES[month] + ' ' + calendar.date.getFullYear());
		},

		create: function(parent) {

			// If no parent was specified, assume that we are creating a popup calendar.
			this.isPopup = false;
			if (!parent) {
				parent = $('body');
				this.isPopup = true;
			}

			// Calendar Table
			var table = $('<table />');

			// Calendar Header
			var thead = $('<thead />');
			table.append(thead);

			// Title Placeholder
			var row  = $('<tr />');
			var cell = $('<td colspan="7" class="title" />');
			row.append(cell);
			thead.append(row);

			// Calendar Navigation
			row = $('<tr />');
			this._drawButtonCell(row, '&#x00ab;', 1, Calendar.NAV_PREVIOUS_YEAR);
			this._drawButtonCell(row, '&#x2039;', 1, Calendar.NAV_PREVIOUS_MONTH);
			this._drawButtonCell(row, Calendar.TODAY,    3, Calendar.NAV_TODAY);
			this._drawButtonCell(row, '&#x203a;', 1, Calendar.NAV_NEXT_MONTH);
			this._drawButtonCell(row, '&#x00bb;', 1, Calendar.NAV_NEXT_YEAR);
			thead.append(row);

			// Day Names
			row = $('<tr />');
			for (var i = 0; i < 7; ++i) {
				var realDay = (i + this.firstDayOfWeek) % 7;
				cell = $('<th />').html(Calendar.SHORT_DAY_NAMES[realDay]);
				if (this.weekend.indexOf(realDay.toString()) != -1)
					cell.addClass('weekend');
				row.append(cell);
			}
			thead.append(row);

			// Calendar Days
			var tbody = table.append($('<tbody />'));
			for (i = 6; i > 0; --i) {
				row = $('<tr />').addClass('days');
				tbody.append(row);
				for (var j = 7; j > 0; --j) {
					cell = $('<td />');
					cell[0].calendar = this;
					row.append(cell);
				}
			}

			// Calendar Container (div)
			this.container = $('<div />').addClass('calendar').append(table);
			if (this.isPopup) {
				this.container.css({
					position: 'absolute',
					display: 'none'
				}).addClass('popup');
			}

			// Initialize Calendar
			this.update(this.date);

			// Observe the container for mousedown events
			this.container.mousedown(Calendar.handleMouseDownEvent);

			// Append to parent element
			parent.append(this.container);
		},

		_drawButtonCell: function(parent, text, colSpan, navAction) {
			var cell = $('<td />');
			if (colSpan > 1) cell[0].colSpan = colSpan; // IE issue attr()
			cell.addClass('button').html(text).attr('unselectable', 'on'); // IE;
			cell[0].calendar     = this;
			cell[0].navAction    = navAction;
			parent.append(cell);
			return cell;
		},

		//------------------------------------------------------------------------------
		// Callbacks
		//------------------------------------------------------------------------------

		/**
		 * Calls the Select Handler (if defined)
		 */
		callSelectHandler: function() {
			if (this.selectHandler) {
				this.selectHandler(this, this.date.print(this.dateFormat));
			}
		},

		/**
		 * Calls the Close Handler (if defined)
		 */
		callCloseHandler: function() {
			if (this.closeHandler) {
				this.closeHandler(this);
			}
		},

		//------------------------------------------------------------------------------
		// Calendar Display Functions
		//------------------------------------------------------------------------------

		/**
		 * Shows the Calendar
		 */
		show: function() {
			this.container.show();
			if (this.isPopup) {
				window._popupCalendar = this;
				$(document).mousedown(Calendar._checkCalendar);
			}
		},

		/**
		 * Shows the calendar at the given absolute position
		 * @param x
		 * @param y
		 */
		showAt: function (x, y) {
			this.container.css({
				left: x + 'px',
				top: y + 'px'
			})
			this.show();
		},

		/**
		 * Shows the Calendar at the coordinates of the provided element
		 * @param element
		 */
		showAtElement: function(element) {
			var offset = element.offset();
			this.showAt(offset.left, offset.top);
		},

		/**
		 * Hides the Calendar
		 */
		hide: function() {
			if (this.isPopup) {
				$(document).unbind('mousedown', Calendar._checkCalendar);
			}
			this.container.hide();
		},

		/**
		 * Tries to identify the date represented in a string.  If successful it also
		 * calls this.setDate which moves the calendar to the given date.
		 * @param str
		 * @param format
		 */
		parseDate: function(str, format) {
			if (!format) {
				format = this.dateFormat;
			}
			this.setDate(Date.parseDate(str, format));
		},

		setDate: function(date) {
			if (!date.equalsTo(this.date))
				this.update(date);
		},

		setRange: function(minYear, maxYear) {
			this.minYear = minYear;
			this.maxYear = maxYear;
		}
	}

	// global object that remembers the calendar
	window._popupCalendar = null;

	//==============================================================================
	// Date Object Patches
	// This is pretty much untouched from the original.
	//==============================================================================
	Date.DAYS_IN_MONTH = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
	Date.SECOND        = 1000; /* milliseconds */
	Date.MINUTE        = 60 * Date.SECOND;
	Date.HOUR          = 60 * Date.MINUTE;
	Date.DAY           = 24 * Date.HOUR;
	Date.WEEK          =  7 * Date.DAY;

	// Parses Date
	Date.parseDate = function(str, fmt) {
		var today = new Date();
		var y     = 0;
		var m     = -1;
		var d     = 0;
		var a     = str.split(/\W+/);
		var b     = fmt.match(/%./g);
		var i     = 0, j = 0;
		var hr    = 0;
		var min   = 0;

		for (i = 0; i < a.length; ++i) {
			if (!a[i]) continue;
			switch (b[i]) {
				case "%d":
				case "%e":
					d = parseInt(a[i], 10);
					break;
				case "%m":
					m = parseInt(a[i], 10) - 1;
					break;
				case "%Y":
				case "%y":
					y = parseInt(a[i], 10);
					(y < 100) && (y += (y > 29) ? 1900 : 2000);
					break;
				case "%b":
				case "%B":
					for (j = 0; j < 12; ++j) {
						if (Calendar.MONTH_NAMES[j].substr(0, a[i].length).toLowerCase() == a[i].toLowerCase()) {
							m = j;
							break;
						}
					}
					break;
				case "%H":
				case "%I":
				case "%k":
				case "%l":
					hr = parseInt(a[i], 10);
					break;
				case "%P":
				case "%p":
					if (/pm/i.test(a[i]) && hr < 12)
						hr += 12;
					else if (/am/i.test(a[i]) && hr >= 12)
						hr -= 12;
					break;
				case "%M":
					min = parseInt(a[i], 10);
					break;
			}
		}
		if (isNaN(y)) y = today.getFullYear();
		if (isNaN(m)) m = today.getMonth();
		if (isNaN(d)) d = today.getDate();
		if (isNaN(hr)) hr = today.getHours();
		if (isNaN(min)) min = today.getMinutes();
		if (y != 0 && m != -1 && d != 0)
			return new Date(y, m, d, hr, min, 0);
		y = 0; m = -1; d = 0;
		for (i = 0; i < a.length; ++i) {
			if (a[i].search(/[a-zA-Z]+/) != -1) {
				var t = -1;
				for (j = 0; j < 12; ++j) {
					if (Calendar.MONTH_NAMES[j].substr(0, a[i].length).toLowerCase() == a[i].toLowerCase()) {
						t = j; break;
					}
				}
				if (t != -1) {
					if (m != -1) {
						d = m+1;
					}
					m = t;
				}
			} else if (parseInt(a[i], 10) <= 12 && m == -1) {
				m = a[i]-1;
			} else if (parseInt(a[i], 10) > 31 && y == 0) {
				y = parseInt(a[i], 10);
				(y < 100) && (y += (y > 29) ? 1900 : 2000);
			} else if (d == 0) {
				d = a[i];
			}
		}
		if (y == 0)
			y = today.getFullYear();
		if (m != -1 && d != 0)
			return new Date(y, m, d, hr, min, 0);
		return today;
	};

	// Returns the number of days in the current month
	Date.prototype.getMonthDays = function(month) {
		var year = this.getFullYear()
		if (typeof month == "undefined")
			month = this.getMonth()
		if (((0 == (year % 4)) && ( (0 != (year % 100)) || (0 == (year % 400)))) && month == 1)
			return 29
		else
			return Date.DAYS_IN_MONTH[month]
	};

	// Returns the number of day in the year
	Date.prototype.getDayOfYear = function() {
		var now = new Date(this.getFullYear(), this.getMonth(), this.getDate(), 0, 0, 0);
		var then = new Date(this.getFullYear(), 0, 0, 0, 0, 0);
		var time = now - then;
		return Math.floor(time / Date.DAY);
	};

	/** Returns the number of the week in year, as defined in ISO 8601. */
	Date.prototype.getWeekNumber = function() {
		var d = new Date(this.getFullYear(), this.getMonth(), this.getDate(), 0, 0, 0);
		var DoW = d.getDay();
		d.setDate(d.getDate() - (DoW + 6) % 7 + 3); // Nearest Thu
		var ms = d.valueOf(); // GMT
		d.setMonth(0);
		d.setDate(4); // Thu in Week 1
		return Math.round((ms - d.valueOf()) / (7 * 864e5)) + 1;
	};

	/** Checks date and time equality */
	Date.prototype.equalsTo = function(date) {
		return ((this.getFullYear() == date.getFullYear()) &&
			(this.getMonth() == date.getMonth()) &&
			(this.getDate() == date.getDate()) &&
			(this.getHours() == date.getHours()) &&
			(this.getMinutes() == date.getMinutes()));
	};

	/** Set only the year, month, date parts (keep existing time) */
	Date.prototype.setDateOnly = function(date) {
		var tmp = new Date(date);
		this.setDate(1);
		this.setFullYear(tmp.getFullYear());
		this.setMonth(tmp.getMonth());
		this.setDate(tmp.getDate());
	};

/** Added by NaN: **************************************************************
 * Date.format()
 * string format ( string format )
 * Formatting rules according to http://php.net/strftime
 *
 * Copyright (C) 2006  Dao Gottwald
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301 USA
 *
 * Contact information:
 *   Dao Gottwald  <dao at design-noir.de>
 *
 * @version  0.7
 * @todo     %g, %G, %U, %V, %W, %z, more/better localization
 * @url      http://design-noir.de/webdev/JS/Date.format/
 */

var _lang = (navigator.systemLanguage || navigator.userLanguage || navigator.language || navigator.browserLanguage || '').replace(/-.*/,'');
switch (_lang) {
	case 'de':
		Date._l10n = {
			days: ['Sonntag','Montag','Dienstag','Mittwoch','Donnerstag','Freitag','Samstag'],
			months: ['Januar','Februar','M\u00E4rz','April','Mai','Juni','Juli','August','September','Oktober','November','Dezember'],
			date: '%e.%m.%Y',
			time: '%H:%M:%S'};
		break;
	case 'es':
		Date._l10n = {
			days: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','S\u00E1bado'],
			months: ['enero','febrero','marcha','abril','puede','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'],
			date: '%e.%m.%Y',
			time: '%H:%M:%S'};
		break;
	case 'fr':
		Date._l10n = {
			days: ['dimanche','lundi','mardi','mercredi','jeudi','vendredi','samedi'],
			months: ['janvier','f\u00E9vrier','mars','avril','mai','juin','juillet','ao\u00FBt','septembre','octobre','novembre','decembre'],
			date: '%e/%m/%Y',
			time: '%H:%M:%S'};
		break;
	case 'it':
		Date._l10n = {
			days: ['domenica','luned\u00EC','marted\u00EC','mercoled\u00EC','gioved\u00EC','venerd\u00EC','sabato'],
			months: ['gennaio','febbraio','marzo','aprile','maggio','giugno','luglio','agosto','settembre','ottobre','novembre','dicembre'],
			date: '%e/%m/%y',
			time: '%H.%M.%S'};
		break;
	case 'pt':
		Date._l10n = {
			days: ['Domingo','Segunda-feira','Ter\u00E7a-feira','Quarta-feira','Quinta-feira','Sexta-feira','S\u00E1bado'],
			months: ['Janeiro','Fevereiro','Mar\u00E7o','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
			date: '%e/%m/%y',
			time: '%H.%M.%S'};
		break;
	case 'en':
	default:
		Date._l10n = {
			days: ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],
			months: ['January','February','March','April','May','June','July','August','September','October','November','December'],
			date: '%Y-%m-%e',
			time: '%H:%M:%S'};
		break;
}
Date._pad = function(num, len) {
	for (var i = 1; i <= len; i++)
		if (num < Math.pow(10, i))
			return new Array(len-i+1).join(0) + num;
	return num;
};
Date.prototype.format = function(format) {
	if (format.indexOf('%%') > -1) { // a literal `%' character
		format = format.split('%%');
		for (var i = 0; i < format.length; i++)
			format[i] = this.format(format[i]);
		return format.join('%');
	}
	format = format.replace(/%D/g, '%m/%d/%y'); // same as %m/%d/%y
	format = format.replace(/%r/g, '%I:%M:%S %p'); // time in a.m. and p.m. notation
	format = format.replace(/%R/g, '%H:%M:%S'); // time in 24 hour notation
	format = format.replace(/%T/g, '%H:%M:%S'); // current time, equal to %H:%M:%S
	format = format.replace(/%x/g, Date._l10n.date); // preferred date representation for the current locale without the time
	format = format.replace(/%X/g, Date._l10n.time); // preferred time representation for the current locale without the date
	var dateObj = this;
	return format.replace(/%([aAbhBcCdegGHIjmMnpStuUVWwyYzZ])/g, function(match0, match1) {
		return dateObj.format_callback(match0, match1);
	});
}
Date.prototype.format_callback = function(match0, match1) {
	switch (match1) {
		case 'a': // abbreviated weekday name according to the current locale
			return Date._l10n.days[this.getDay()].substr(0,3);
		case 'A': // full weekday name according to the current locale
			return Date._l10n.days[this.getDay()];
		case 'b':
		case 'h': // abbreviated month name according to the current locale
			return Date._l10n.months[this.getMonth()].substr(0,3);
		case 'B': // full month name according to the current locale
			return Date._l10n.months[this.getMonth()];
		case 'c': // preferred date and time representation for the current locale
			return this.toLocaleString();
		case 'C': // century number (the year divided by 100 and truncated to an integer, range 00 to 99)
			return Math.floor(this.getFullYear() / 100);
		case 'd': // day of the month as a decimal number (range 01 to 31)
			return Date._pad(this.getDate(), 2);
		case 'e': // day of the month as a decimal number, a single digit is preceded by a space (range ' 1' to '31')
			return Date._pad(this.getDate(), 2);
		/*case 'g': // like %G, but without the century
			return ;
		case 'G': // The 4-digit year corresponding to the ISO week number (see %V). This has the same format and value as %Y, except that if the ISO week number belongs to the previous or next year, that year is used instead
			return ;*/
		case 'H': // hour as a decimal number using a 24-hour clock (range 00 to 23)
			return Date._pad(this.getHours(), 2);
		case 'I': // hour as a decimal number using a 12-hour clock (range 01 to 12)
			return Date._pad(this.getHours() % 12, 2);
		case 'j': // day of the year as a decimal number (range 001 to 366)
			return Date._pad(this.getMonth() * 30 + Math.ceil(this.getMonth() / 2) + this.getDay() - 2 * (this.getMonth() > 1) + (!(this.getFullYear() % 400) || (!(this.getFullYear() % 4) && this.getFullYear() % 100)), 3);
		case 'm': // month as a decimal number (range 01 to 12)
			return Date._pad(this.getMonth() + 1, 2);
		case 'M': // minute as a decimal number
			return Date._pad(this.getMinutes(), 2);
		case 'n': // newline character
			return '\n';
		case 'p': // either `am' or `pm' according to the given time value, or the corresponding strings for the current locale
			return this.getHours() < 12 ? 'am' : 'pm';
		case 'S': // second as a decimal number
			return Date._pad(this.getSeconds(), 2);
		case 't': // tab character
			return '\t';
		case 'u': // weekday as a decimal number [1,7], with 1 representing Monday
			return this.getDay() || 7;
		/*case 'U': // week number of the current year as a decimal number, starting with the first Sunday as the first day of the first week
			return ;
		case 'V': // The ISO 8601:1988 week number of the current year as a decimal number, range 01 to 53, where week 1 is the first week that has at least 4 days in the current year, and with Monday as the first day of the week. (Use %G or %g for the year component that corresponds to the week number for the specified timestamp.)
			return ;
		case 'W': // week number of the current year as a decimal number, starting with the first Monday as the first day of the first week
			return ;*/
		case 'w': // day of the week as a decimal, Sunday being 0
			return this.getDay();
		case 'y': // year as a decimal number without a century (range 00 to 99)
			return this.getFullYear().toString().substr(2);
		case 'Y': // year as a decimal number including the century
			return this.getFullYear();
		/*case 'z':
		case 'Z': // time zone or name or abbreviation
			return ;*/
		default:
			return match0;
	}
}

/******************************************************************************/

	/** Prints the date in a string according to the given format. */
	Date.prototype.print = function (str) {
		return this.format(str);
		/*
		var m = this.getMonth();
		var d = this.getDate();
		var y = this.getFullYear();
		var wn = this.getWeekNumber();
		var w = this.getDay();
		var s = {};
		var hr = this.getHours();
		var pm = (hr >= 12);
		var ir = (pm) ? (hr - 12) : hr;
		var dy = this.getDayOfYear();
		if (ir == 0)
			ir = 12;
		var min = this.getMinutes();
		var sec = this.getSeconds();
		s["%a"] = Calendar.SHORT_DAY_NAMES[w]; // abbreviated weekday name [FIXME: I18N]
		s["%A"] = Calendar.DAY_NAMES[w]; // full weekday name
		s["%b"] = Calendar.SHORT_MONTH_NAMES[m]; // abbreviated month name [FIXME: I18N]
		s["%B"] = Calendar.MONTH_NAMES[m]; // full month name
		// FIXME: %c : preferred date and time representation for the current locale
		s["%C"] = 1 + Math.floor(y / 100); // the century number
		s["%d"] = (d < 10) ? ("0" + d) : d; // the day of the month (range 01 to 31)
		s["%e"] = d; // the day of the month (range 1 to 31)
		// FIXME: %D : american date style: %m/%d/%y
		// FIXME: %E, %F, %G, %g, %h (man strftime)
		s["%H"] = (hr < 10) ? ("0" + hr) : hr; // hour, range 00 to 23 (24h format)
		s["%I"] = (ir < 10) ? ("0" + ir) : ir; // hour, range 01 to 12 (12h format)
		s["%j"] = (dy < 100) ? ((dy < 10) ? ("00" + dy) : ("0" + dy)) : dy; // day of the year (range 001 to 366)
		s["%k"] = hr;   // hour, range 0 to 23 (24h format)
		s["%l"] = ir;   // hour, range 1 to 12 (12h format)
		s["%m"] = (m < 9) ? ("0" + (1+m)) : (1+m); // month, range 01 to 12
		s["%M"] = (min < 10) ? ("0" + min) : min; // minute, range 00 to 59
		s["%n"] = "\n";   // a newline character
		s["%p"] = pm ? "PM" : "AM";
		s["%P"] = pm ? "pm" : "am";
		// FIXME: %r : the time in am/pm notation %I:%M:%S %p
		// FIXME: %R : the time in 24-hour notation %H:%M
		s["%s"] = Math.floor(this.getTime() / 1000);
		s["%S"] = (sec < 10) ? ("0" + sec) : sec; // seconds, range 00 to 59
		s["%t"] = "\t";   // a tab character
		// FIXME: %T : the time in 24-hour notation (%H:%M:%S)
		s["%U"] = s["%W"] = s["%V"] = (wn < 10) ? ("0" + wn) : wn;
		s["%u"] = w + 1;  // the day of the week (range 1 to 7, 1 = MON)
		s["%w"] = w;    // the day of the week (range 0 to 6, 0 = SUN)
		// FIXME: %x : preferred date representation for the current locale without the time
		// FIXME: %X : preferred time representation for the current locale without the date
		s["%y"] = ('' + y).substr(2, 2); // year without the century (range 00 to 99)
		s["%Y"] = y;    // year with the century
		s["%%"] = "%";    // a literal '%' character

		var re = /%./g;
		var a = str.match(re);
		for (var i = 0; i < a.length; i++) {
			var tmp = s[a[i]];
			if (tmp) {
				re = new RegExp(a[i], 'g');
				str = str.replace(re, tmp);
			}
		}

		return str;
		*/
	};

	Date.prototype.__msh_oldSetFullYear = Date.prototype.setFullYear;
	Date.prototype.setFullYear = function(y) {
		var d = new Date(this);
		d.__msh_oldSetFullYear(y);
		if (d.getMonth() != this.getMonth())
			this.setDate(28);
		this.__msh_oldSetFullYear(y);
	}

	//------------------------------------------------------------------------------
	// The jQuery plugin function
	//------------------------------------------------------------------------------
	$.fn.calendar = function(options) {
		var defaults = {
			triggerElement: null, // Popup calendar
			parentElement: null, // Inline calendar
			minYear: 1900,
			maxYear: 2100,
			firstDayOfWeek: 1, // Monday
			weekend: "0,6", // Sunday and Saturday
			dateFormat: '%Y-%m-%d',
			dateField: null,
			selectHandler: null,
			closeHandler: null
		};
		var settings = $.extend({}, defaults, options);

		this.each(function() {
			var self = $(this);
			var calendar = new Calendar();

			calendar.minYear = settings.minYear;
			calendar.maxYear = settings.maxYear;

			calendar.firstDayOfWeek = settings.firstDayOfWeek;
			calendar.weekend = settings.weekend;
			calendar.dateFormat = settings.dateFormat;
			calendar.dateField = (settings.dateField || self);

			calendar.selectHandler = (settings.selectHandler || Calendar.defaultSelectHandler);

			// Inline Calendar
			var selfDate = self.html() || self.val();
			if (settings.parentElement) {
				calendar.create($(settings.parentElement));
				if (selfDate) calendar.parseDate(selfDate);
				calendar.show();
			} else {
				// Popup Calendar
				calendar.create();
				if (selfDate) calendar.parseDate(selfDate);
				var triggerElement = $(settings.triggerElement || self);
				triggerElement.click(function() {
					calendar.closeHandler = (settings.closeHandler || Calendar.defaultCloseHandler);
					calendar.showAtElement(triggerElement);
				});
			}
		});

		return this;
	}

})(jQuery);
/*!
 * jQuery Form Plugin
 * version: 2.43 (12-MAR-2010)
 * @requires jQuery v1.3.2 or later
 *
 * Examples and documentation at: http://malsup.com/jquery/form/
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 */
(function($) {$.fn.ajaxSubmit=function(options){if(!this.length){log('ajaxSubmit: skipping submit process - no element selected');return this}if(typeof options=='function')options={success:options};var url=$.trim(this.attr('action'));if(url){url=(url.match(/^([^#]+)/)||[])[1]}url=url||window.location.href||'';options=$.extend({url:url,type:this.attr('method')||'GET',iframeSrc:/^https/i.test(window.location.href||'')?'javascript:false':'about:blank'},options||{});var veto={};this.trigger('form-pre-serialize',[this,options,veto]);if(veto.veto){log('ajaxSubmit: submit vetoed via form-pre-serialize trigger');return this}if(options.beforeSerialize&&options.beforeSerialize(this,options)===false){log('ajaxSubmit: submit aborted via beforeSerialize callback');return this}var a=this.formToArray(options.semantic);if(options.data){options.extraData=options.data;for(var n in options.data){if(options.data[n]instanceof Array){for(var k in options.data[n])a.push({name:n,value:options.data[n][k]})}else a.push({name:n,value:options.data[n]})}}if(options.beforeSubmit&&options.beforeSubmit(a,this,options)===false){log('ajaxSubmit: submit aborted via beforeSubmit callback');return this}this.trigger('form-submit-validate',[a,this,options,veto]);if(veto.veto){log('ajaxSubmit: submit vetoed via form-submit-validate trigger');return this}var q=$.param(a);if(options.type.toUpperCase()=='GET'){options.url+=(options.url.indexOf('?')>=0?'&':'?')+q;options.data=null}else options.data=q;var $form=this,callbacks=[];if(options.resetForm)callbacks.push(function(){$form.resetForm()});if(options.clearForm)callbacks.push(function(){$form.clearForm()});if(!options.dataType&&options.target){var oldSuccess=options.success||function(){};callbacks.push(function(data){var fn=options.replaceTarget?'replaceWith':'html';$(options.target)[fn](data).each(oldSuccess,arguments)})}else if(options.success)callbacks.push(options.success);options.success=function(data,status,xhr){for(var i=0,max=callbacks.length;i<max;i++)callbacks[i].apply(options,[data,status,xhr||$form,$form])};var files=$('input:file',this).fieldValue();var found=false;for(var j=0;j<files.length;j++)if(files[j])found=true;var multipart=false;if((files.length&&options.iframe!==false)||options.iframe||found||multipart){if(options.closeKeepAlive)$.get(options.closeKeepAlive,fileUpload);else fileUpload()}else $.ajax(options);this.trigger('form-submit-notify',[this,options]);return this;function fileUpload(){var form=$form[0];if($(':input[name=submit]',form).length){alert('Error: Form elements must not be named "submit".');return}var opts=$.extend({},$.ajaxSettings,options);var s=$.extend(true,{},$.extend(true,{},$.ajaxSettings),opts);var id='jqFormIO'+(new Date().getTime());var $io=$('<iframe id="'+id+'" name="'+id+'" src="'+opts.iframeSrc+'" onload="(jQuery(this).data(\'form-plugin-onload\'))()" />');var io=$io[0];$io.css({position:'absolute',top:'-1000px',left:'-1000px'});var xhr={aborted:0,responseText:null,responseXML:null,status:0,statusText:'n/a',getAllResponseHeaders:function(){},getResponseHeader:function(){},setRequestHeader:function(){},abort:function(){this.aborted=1;$io.attr('src',opts.iframeSrc)}};var g=opts.global;if(g&&!$.active++)$.event.trigger("ajaxStart");if(g)$.event.trigger("ajaxSend",[xhr,opts]);if(s.beforeSend&&s.beforeSend(xhr,s)===false){s.global&&$.active--;return}if(xhr.aborted)return;var cbInvoked=false;var timedOut=0;var sub=form.clk;if(sub){var n=sub.name;if(n&&!sub.disabled){opts.extraData=opts.extraData||{};opts.extraData[n]=sub.value;if(sub.type=="image"){opts.extraData[n+'.x']=form.clk_x;opts.extraData[n+'.y']=form.clk_y}}}function doSubmit(){var t=$form.attr('target'),a=$form.attr('action');form.setAttribute('target',id);if(form.getAttribute('method')!='POST')form.setAttribute('method','POST');if(form.getAttribute('action')!=opts.url)form.setAttribute('action',opts.url);if(!opts.skipEncodingOverride){$form.attr({encoding:'multipart/form-data',enctype:'multipart/form-data'})}if(opts.timeout)setTimeout(function(){timedOut=true;cb()},opts.timeout);var extraInputs=[];try{if(opts.extraData)for(var n in opts.extraData)extraInputs.push($('<input type="hidden" name="'+n+'" value="'+opts.extraData[n]+'" />').appendTo(form)[0]);$io.appendTo('body');$io.data('form-plugin-onload',cb);form.submit()}finally{form.setAttribute('action',a);t?form.setAttribute('target',t):$form.removeAttr('target');$(extraInputs).remove()}};if(opts.forceSync)doSubmit();else setTimeout(doSubmit,10);var domCheckCount=100;function cb(){if(cbInvoked)return;var ok=true;try{if(timedOut)throw'timeout';var data,doc;doc=io.contentWindow?io.contentWindow.document:io.contentDocument?io.contentDocument:io.document;var isXml=opts.dataType=='xml'||doc.XMLDocument||$.isXMLDoc(doc);log('isXml='+isXml);if(!isXml&&(doc.body==null||doc.body.innerHTML=='')){if(--domCheckCount){log('requeing onLoad callback, DOM not available');setTimeout(cb,250);return}log('Could not access iframe DOM after 100 tries.');return}log('response detected');cbInvoked=true;xhr.responseText=doc.body?doc.body.innerHTML:null;xhr.responseXML=doc.XMLDocument?doc.XMLDocument:doc;xhr.getResponseHeader=function(header){var headers={'content-type':opts.dataType};return headers[header]};if(opts.dataType=='json'||opts.dataType=='script'){var ta=doc.getElementsByTagName('textarea')[0];if(ta)xhr.responseText=ta.value;else{var pre=doc.getElementsByTagName('pre')[0];if(pre)xhr.responseText=pre.innerHTML}}else if(opts.dataType=='xml'&&!xhr.responseXML&&xhr.responseText!=null){xhr.responseXML=toXml(xhr.responseText)}data=$.httpData(xhr,opts.dataType)}catch(e){log('error caught:',e);ok=false;xhr.error=e;$.handleError(opts,xhr,'error',e)}if(ok){opts.success(data,'success');if(g)$.event.trigger("ajaxSuccess",[xhr,opts])}if(g)$.event.trigger("ajaxComplete",[xhr,opts]);if(g&&!--$.active)$.event.trigger("ajaxStop");if(opts.complete)opts.complete(xhr,ok?'success':'error');setTimeout(function(){$io.removeData('form-plugin-onload');$io.remove();xhr.responseXML=null},100)};function toXml(s,doc){if(window.ActiveXObject){doc=new ActiveXObject('Microsoft.XMLDOM');doc.async='false';doc.loadXML(s)}else doc=(new DOMParser()).parseFromString(s,'text/xml');return(doc&&doc.documentElement&&doc.documentElement.tagName!='parsererror')?doc:null}}};$.fn.ajaxForm=function(options){return this.ajaxFormUnbind().bind('submit.form-plugin',function(e){e.preventDefault();$(this).ajaxSubmit(options)}).bind('click.form-plugin',function(e){var target=e.target;var $el=$(target);if(!($el.is(":submit,input:image"))){var t=$el.closest(':submit');if(t.length==0)return;target=t[0]}var form=this;form.clk=target;if(target.type=='image'){if(e.offsetX!=undefined){form.clk_x=e.offsetX;form.clk_y=e.offsetY}else if(typeof $.fn.offset=='function'){var offset=$el.offset();form.clk_x=e.pageX-offset.left;form.clk_y=e.pageY-offset.top}else{form.clk_x=e.pageX-target.offsetLeft;form.clk_y=e.pageY-target.offsetTop}}setTimeout(function(){form.clk=form.clk_x=form.clk_y=null},100)})};$.fn.ajaxFormUnbind=function(){return this.unbind('submit.form-plugin click.form-plugin')};$.fn.formToArray=function(semantic){var a=[];if(this.length==0)return a;var form=this[0];var els=semantic?form.getElementsByTagName('*'):form.elements;if(!els)return a;for(var i=0,max=els.length;i<max;i++){var el=els[i];var n=el.name;if(!n)continue;if(semantic&&form.clk&&el.type=="image"){if(!el.disabled&&form.clk==el){a.push({name:n,value:$(el).val()});a.push({name:n+'.x',value:form.clk_x},{name:n+'.y',value:form.clk_y})}continue}var v=$.fieldValue(el,true);if(v&&v.constructor==Array){for(var j=0,jmax=v.length;j<jmax;j++)a.push({name:n,value:v[j]})}else if(v!==null&&typeof v!='undefined')a.push({name:n,value:v})}if(!semantic&&form.clk){var $input=$(form.clk),input=$input[0],n=input.name;if(n&&!input.disabled&&input.type=='image'){a.push({name:n,value:$input.val()});a.push({name:n+'.x',value:form.clk_x},{name:n+'.y',value:form.clk_y})}}return a};$.fn.formSerialize=function(semantic){return $.param(this.formToArray(semantic))};$.fn.fieldSerialize=function(successful){var a=[];this.each(function(){var n=this.name;if(!n)return;var v=$.fieldValue(this,successful);if(v&&v.constructor==Array){for(var i=0,max=v.length;i<max;i++)a.push({name:n,value:v[i]})}else if(v!==null&&typeof v!='undefined')a.push({name:this.name,value:v})});return $.param(a)};$.fn.fieldValue=function(successful){for(var val=[],i=0,max=this.length;i<max;i++){var el=this[i];var v=$.fieldValue(el,successful);if(v===null||typeof v=='undefined'||(v.constructor==Array&&!v.length))continue;v.constructor==Array?$.merge(val,v):val.push(v)}return val};$.fieldValue=function(el,successful){var n=el.name,t=el.type,tag=el.tagName.toLowerCase();if(typeof successful=='undefined')successful=true;if(successful&&(!n||el.disabled||t=='reset'||t=='button'||(t=='checkbox'||t=='radio')&&!el.checked||(t=='submit'||t=='image')&&el.form&&el.form.clk!=el||tag=='select'&&el.selectedIndex==-1))return null;if(tag=='select'){var index=el.selectedIndex;if(index<0)return null;var a=[],ops=el.options;var one=(t=='select-one');var max=(one?index+1:ops.length);for(var i=(one?index:0);i<max;i++){var op=ops[i];if(op.selected){var v=op.value;if(!v)v=(op.attributes&&op.attributes['value']&&!(op.attributes['value'].specified))?op.text:op.value;if(one)return v;a.push(v)}}return a}return el.value};$.fn.clearForm=function(){return this.each(function(){$('input,select,textarea',this).clearFields()})};$.fn.clearFields=$.fn.clearInputs=function(){return this.each(function(){var t=this.type,tag=this.tagName.toLowerCase();if(t=='text'||t=='password'||tag=='textarea')this.value='';else if(t=='checkbox'||t=='radio')this.checked=false;else if(tag=='select')this.selectedIndex=-1})};$.fn.resetForm=function(){return this.each(function(){if(typeof this.reset=='function'||(typeof this.reset=='object'&&!this.reset.nodeType))this.reset()})};$.fn.enable=function(b){if(b==undefined)b=true;return this.each(function(){this.disabled=!b})};$.fn.selected=function(select){if(select==undefined)select=true;return this.each(function(){var t=this.type;if(t=='checkbox'||t=='radio')this.checked=select;else if(this.tagName.toLowerCase()=='option'){var $sel=$(this).parent('select');if(select&&$sel[0]&&$sel[0].type=='select-one'){$sel.find('option').selected(false)}this.selected=select}})};function log(){if($.fn.ajaxSubmit.debug){var msg='[jquery.form] '+Array.prototype.join.call(arguments,'');if(window.console&&window.console.log)window.console.log(msg);else if(window.opera&&window.opera.postError)window.opera.postError(msg)}}})(jQuery);
﻿/*
 * jPicker 1.1.6
 *
 * jQuery Plugin for Photoshop style color picker
 *
 * Copyright (c) 2010 Christopher T. Tillman
 * Digital Magic Productions, Inc. (http://www.digitalmagicpro.com/)
 * MIT style license, FREE to use, alter, copy, sell, and especially ENHANCE
 *
 * Painstakingly ported from John Dyers' excellent work on his own color picker based on the Prototype framework.
 *
 * John Dyers' website: (http://johndyer.name)
 * Color Picker page:   (http://johndyer.name/post/2007/09/PhotoShop-like-JavaScript-Color-Picker.aspx)
 *
 */
﻿(function(e,a){Math.precision=function(j,h){if(h===undefined){h=0}return Math.round(j*Math.pow(10,h))/Math.pow(10,h)};var d=function(z,k){var o=this,j=z.find("img:first"),F=0,E=100,w=100,D=0,C=100,v=100,s=0,p=0,n,q,u=new Array(),l=function(y){for(var x=0;x<u.length;x++){u[x].call(o,o,y)}},H=function(x){var y=z.offset();n={l:y.left|0,t:y.top|0};clearTimeout(q);q=setTimeout(function(){A.call(o,x)},0);e(document).bind("mousemove",h).bind("mouseup",B);x.preventDefault()},h=function(x){clearTimeout(q);q=setTimeout(function(){A.call(o,x)},0);x.stopPropagation();x.preventDefault();return false},B=function(x){e(document).unbind("mouseup",B).unbind("mousemove",h);x.stopPropagation();x.preventDefault();return false},A=function(M){var K=M.pageX-n.l,x=M.pageY-n.t,L=z.w,y=z.h;if(K<0){K=0}else{if(K>L){K=L}}if(x<0){x=0}else{if(x>y){x=y}}J.call(o,"xy",{x:((K/L)*w)+F,y:((x/y)*v)+D})},r=function(){var L=0,x=0,N=z.w,K=z.h,M=j.w,y=j.h;setTimeout(function(){if(w>0){if(s==E){L=N}else{L=((s/w)*N)|0}}if(v>0){if(p==C){x=K}else{x=((p/v)*K)|0}}if(M>=N){L=(N>>1)-(M>>1)}else{L-=M>>1}if(y>=K){x=(K>>1)-(y>>1)}else{x-=y>>1}j.css({left:L+"px",top:x+"px"})},0)},J=function(x,K,y){var O=K!==undefined;if(!O){if(x===undefined||x==null){x="xy"}switch(x.toLowerCase()){case"x":return s;case"y":return p;case"xy":default:return{x:s,y:p}}}if(y!=null&&y==o){return}var N=false,M,L;if(x==null){x="xy"}switch(x.toLowerCase()){case"x":M=K&&(K.x&&K.x|0||K|0)||0;break;case"y":L=K&&(K.y&&K.y|0||K|0)||0;break;case"xy":default:M=K&&K.x&&K.x|0||0;L=K&&K.y&&K.y|0||0;break}if(M!=null){if(M<F){M=F}else{if(M>E){M=E}}if(s!=M){s=M;N=true}}if(L!=null){if(L<D){L=D}else{if(L>C){L=C}}if(p!=L){p=L;N=true}}N&&l.call(o,y||o)},t=function(x,L){var P=L!==undefined;if(!P){if(x===undefined||x==null){x="all"}switch(x.toLowerCase()){case"minx":return F;case"maxx":return E;case"rangex":return{minX:F,maxX:E,rangeX:w};case"miny":return D;case"maxy":return C;case"rangey":return{minY:D,maxY:C,rangeY:v};case"all":default:return{minX:F,maxX:E,rangeX:w,minY:D,maxY:C,rangeY:v}}}var O=false,N,K,M,y;if(x==null){x="all"}switch(x.toLowerCase()){case"minx":N=L&&(L.minX&&L.minX|0||L|0)||0;break;case"maxx":K=L&&(L.maxX&&L.maxX|0||L|0)||0;break;case"rangex":N=L&&L.minX&&L.minX|0||0;K=L&&L.maxX&&L.maxX|0||0;break;case"miny":M=L&&(L.minY&&L.minY|0||L|0)||0;break;case"maxy":y=L&&(L.maxY&&L.maxY|0||L|0)||0;break;case"rangey":M=L&&L.minY&&L.minY|0||0;y=L&&L.maxY&&L.maxY|0||0;break;case"all":default:N=L&&L.minX&&L.minX|0||0;K=L&&L.maxX&&L.maxX|0||0;M=L&&L.minY&&L.minY|0||0;y=L&&L.maxY&&L.maxY|0||0;break}if(N!=null&&F!=N){F=N;w=E-F}if(K!=null&&E!=K){E=K;w=E-F}if(M!=null&&D!=M){D=M;v=C-D}if(y!=null&&C!=y){C=y;v=C-D}},I=function(x){if(e.isFunction(x)){u.push(x)}},m=function(y){if(!e.isFunction(y)){return}var x;while((x=e.inArray(y,u))!=-1){u.splice(x,1)}},G=function(){e(document).unbind("mouseup",B).unbind("mousemove",h);z.unbind("mousedown",H);z=null;j=null;u=null};e.extend(true,o,{val:J,range:t,bind:I,unbind:m,destroy:G});j.src=k.arrow&&k.arrow.image;j.w=k.arrow&&k.arrow.width||j.width();j.h=k.arrow&&k.arrow.height||j.height();z.w=k.map&&k.map.width||z.width();z.h=k.map&&k.map.height||z.height();z.bind("mousedown",H);I.call(o,r)},b=function(u,z,k,y){var q=this,l=u.find("td.Text input"),r=l.eq(3),v=l.eq(4),h=l.eq(5),o=l.length>7?l.eq(6):null,n=l.eq(0),p=l.eq(1),x=l.eq(2),s=l.eq(l.length>7?7:6),B=l.length>7?l.eq(8):null,C=function(E){if(E.target.value==""&&E.target!=s.get(0)&&(k!=null&&E.target!=k.get(0)||k==null)){return}if(!t(E)){return E}switch(E.target){case r.get(0):switch(E.keyCode){case 38:r.val(j.call(q,(r.val()<<0)+1,0,255));z.val("r",r.val(),E.target);return false;case 40:r.val(j.call(q,(r.val()<<0)-1,0,255));z.val("r",r.val(),E.target);return false}break;case v.get(0):switch(E.keyCode){case 38:v.val(j.call(q,(v.val()<<0)+1,0,255));z.val("g",v.val(),E.target);return false;case 40:v.val(j.call(q,(v.val()<<0)-1,0,255));z.val("g",v.val(),E.target);return false}break;case h.get(0):switch(E.keyCode){case 38:h.val(j.call(q,(h.val()<<0)+1,0,255));z.val("b",h.val(),E.target);return false;case 40:h.val(j.call(q,(h.val()<<0)-1,0,255));z.val("b",h.val(),E.target);return false}break;case o&&o.get(0):switch(E.keyCode){case 38:o.val(j.call(q,parseFloat(o.val())+1,0,100));z.val("a",Math.precision((o.val()*255)/100,y),E.target);return false;case 40:o.val(j.call(q,parseFloat(o.val())-1,0,100));z.val("a",Math.precision((o.val()*255)/100,y),E.target);return false}break;case n.get(0):switch(E.keyCode){case 38:n.val(j.call(q,(n.val()<<0)+1,0,360));z.val("h",n.val(),E.target);return false;case 40:n.val(j.call(q,(n.val()<<0)-1,0,360));z.val("h",n.val(),E.target);return false}break;case p.get(0):switch(E.keyCode){case 38:p.val(j.call(q,(p.val()<<0)+1,0,100));z.val("s",p.val(),E.target);return false;case 40:p.val(j.call(q,(p.val()<<0)-1,0,100));z.val("s",p.val(),E.target);return false}break;case x.get(0):switch(E.keyCode){case 38:x.val(j.call(q,(x.val()<<0)+1,0,100));z.val("v",x.val(),E.target);return false;case 40:x.val(j.call(q,(x.val()<<0)-1,0,100));z.val("v",x.val(),E.target);return false}break}},w=function(E){if(E.target.value==""&&E.target!=s.get(0)&&(k!=null&&E.target!=k.get(0)||k==null)){return}if(!t(E)){return E}switch(E.target){case r.get(0):r.val(j.call(q,r.val(),0,255));z.val("r",r.val(),E.target);break;case v.get(0):v.val(j.call(q,v.val(),0,255));z.val("g",v.val(),E.target);break;case h.get(0):h.val(j.call(q,h.val(),0,255));z.val("b",h.val(),E.target);break;case o&&o.get(0):o.val(j.call(q,o.val(),0,100));z.val("a",Math.precision((o.val()*255)/100,y),E.target);break;case n.get(0):n.val(j.call(q,n.val(),0,360));z.val("h",n.val(),E.target);break;case p.get(0):p.val(j.call(q,p.val(),0,100));z.val("s",p.val(),E.target);break;case x.get(0):x.val(j.call(q,x.val(),0,100));z.val("v",x.val(),E.target);break;case s.get(0):s.val(s.val().replace(/[^a-fA-F0-9]/g,"").toLowerCase().substring(0,6));k&&k.val(s.val());z.val("hex",s.val()!=""?s.val():null,E.target);break;case k&&k.get(0):k.val(k.val().replace(/[^a-fA-F0-9]/g,"").toLowerCase().substring(0,6));s.val(k.val());z.val("hex",k.val()!=""?k.val():null,E.target);break;case B&&B.get(0):B.val(B.val().replace(/[^a-fA-F0-9]/g,"").toLowerCase().substring(0,2));z.val("a",B.val()!=null?parseInt(B.val(),16):null,E.target);break}},A=function(E){if(z.val()!=null){switch(E.target){case r.get(0):r.val(z.val("r"));break;case v.get(0):v.val(z.val("g"));break;case h.get(0):h.val(z.val("b"));break;case o&&o.get(0):o.val(Math.precision((z.val("a")*100)/255,y));break;case n.get(0):n.val(z.val("h"));break;case p.get(0):p.val(z.val("s"));break;case x.get(0):x.val(z.val("v"));break;case s.get(0):case k&&k.get(0):s.val(z.val("hex"));k&&k.val(z.val("hex"));break;case B&&B.get(0):B.val(z.val("ahex").substring(6));break}}},t=function(E){switch(E.keyCode){case 9:case 16:case 29:case 37:case 39:return false;case"c".charCodeAt():case"v".charCodeAt():if(E.ctrlKey){return false}}return true},j=function(G,F,E){if(G==""||isNaN(G)){return F}if(G>E){return E}if(G<F){return F}return G},m=function(G,E){var F=G.val("all");if(E!=r.get(0)){r.val(F!=null?F.r:"")}if(E!=v.get(0)){v.val(F!=null?F.g:"")}if(E!=h.get(0)){h.val(F!=null?F.b:"")}if(o&&E!=o.get(0)){o.val(F!=null?Math.precision((F.a*100)/255,y):"")}if(E!=n.get(0)){n.val(F!=null?F.h:"")}if(E!=p.get(0)){p.val(F!=null?F.s:"")}if(E!=x.get(0)){x.val(F!=null?F.v:"")}if(E!=s.get(0)&&(k&&E!=k.get(0)||!k)){s.val(F!=null?F.hex:"")}if(k&&E!=k.get(0)&&E!=s.get(0)){k.val(F!=null?F.hex:"")}if(B&&E!=B.get(0)){B.val(F!=null?F.ahex.substring(6):"")}},D=function(){r.add(v).add(h).add(o).add(n).add(p).add(x).add(s).add(k).add(B).unbind("keyup",w).unbind("blur",A);r.add(v).add(h).add(o).add(n).add(p).add(x).unbind("keydown",C);z.unbind(m);r=null;v=null;h=null;o=null;n=null;p=null;x=null;s=null;B=null};e.extend(true,q,{destroy:D});r.add(v).add(h).add(o).add(n).add(p).add(x).add(s).add(k).add(B).bind("keyup",w).bind("blur",A);r.add(v).add(h).add(o).add(n).add(p).add(x).bind("keydown",C);z.bind(m)};e.jPicker={List:[],Color:function(z){var q=this,j,o,t,u,n,A,x,k=new Array(),m=function(r){for(var h=0;h<k.length;h++){k[h].call(q,q,r)}},l=function(h,G,r){var F=G!==undefined;if(!F){if(h===undefined||h==null||h==""){h="all"}if(j==null){return null}switch(h.toLowerCase()){case"ahex":return g.rgbaToHex({r:j,g:o,b:t,a:u});case"hex":return l("ahex").substring(0,6);case"all":return{r:j,g:o,b:t,a:u,h:n,s:A,v:x,hex:l.call(q,"hex"),ahex:l.call(q,"ahex")};default:var D={};for(var B=0;B<h.length;B++){switch(h.charAt(B)){case"r":if(h.length==1){D=j}else{D.r=j}break;case"g":if(h.length==1){D=o}else{D.g=o}break;case"b":if(h.length==1){D=t}else{D.b=t}break;case"a":if(h.length==1){D=u}else{D.a=u}break;case"h":if(h.length==1){D=n}else{D.h=n}break;case"s":if(h.length==1){D=A}else{D.s=A}break;case"v":if(h.length==1){D=x}else{D.v=x}break}}return D=={}?l.call(q,"all"):D;break}}if(r!=null&&r==q){return}var v=false;if(h==null){h=""}if(G==null){if(j!=null){j=null;v=true}if(o!=null){o=null;v=true}if(t!=null){t=null;v=true}if(u!=null){u=null;v=true}if(n!=null){n=null;v=true}if(A!=null){A=null;v=true}if(x!=null){x=null;v=true}v&&m.call(q,r||q);return}switch(h.toLowerCase()){case"ahex":case"hex":var D=g.hexToRgba(G&&(G.ahex||G.hex)||G||"00000000");l.call(q,"rgba",{r:D.r,g:D.g,b:D.b,a:h=="ahex"?D.a:u!=null?u:255},r);break;default:if(G&&(G.ahex!=null||G.hex!=null)){l.call(q,"ahex",G.ahex||G.hex||"00000000",r);return}var s={},E=false,C=false;if(G.r!==undefined&&!h.indexOf("r")==-1){h+="r"}if(G.g!==undefined&&!h.indexOf("g")==-1){h+="g"}if(G.b!==undefined&&!h.indexOf("b")==-1){h+="b"}if(G.a!==undefined&&!h.indexOf("a")==-1){h+="a"}if(G.h!==undefined&&!h.indexOf("h")==-1){h+="h"}if(G.s!==undefined&&!h.indexOf("s")==-1){h+="s"}if(G.v!==undefined&&!h.indexOf("v")==-1){h+="v"}for(var B=0;B<h.length;B++){switch(h.charAt(B)){case"r":if(C){continue}E=true;s.r=G&&G.r&&G.r|0||G&&G|0||0;if(s.r<0){s.r=0}else{if(s.r>255){s.r=255}}if(j!=s.r){j=s.r;v=true}break;case"g":if(C){continue}E=true;s.g=G&&G.g&&G.g|0||G&&G|0||0;if(s.g<0){s.g=0}else{if(s.g>255){s.g=255}}if(o!=s.g){o=s.g;v=true}break;case"b":if(C){continue}E=true;s.b=G&&G.b&&G.b|0||G&&G|0||0;if(s.b<0){s.b=0}else{if(s.b>255){s.b=255}}if(t!=s.b){t=s.b;v=true}break;case"a":s.a=G&&G.a!=null?G.a|0:G!=null?G|0:255;if(s.a<0){s.a=0}else{if(s.a>255){s.a=255}}if(u!=s.a){u=s.a;v=true}break;case"h":if(E){continue}C=true;s.h=G&&G.h&&G.h|0||G&&G|0||0;if(s.h<0){s.h=0}else{if(s.h>360){s.h=360}}if(n!=s.h){n=s.h;v=true}break;case"s":if(E){continue}C=true;s.s=G&&G.s!=null?G.s|0:G!=null?G|0:100;if(s.s<0){s.s=0}else{if(s.s>100){s.s=100}}if(A!=s.s){A=s.s;v=true}break;case"v":if(E){continue}C=true;s.v=G&&G.v!=null?G.v|0:G!=null?G|0:100;if(s.v<0){s.v=0}else{if(s.v>100){s.v=100}}if(x!=s.v){x=s.v;v=true}break}}if(v){if(E){j=j||0;o=o||0;t=t||0;var D=g.rgbToHsv({r:j,g:o,b:t});n=D.h;A=D.s;x=D.v}else{if(C){n=n||0;A=A!=null?A:100;x=x!=null?x:100;var D=g.hsvToRgb({h:n,s:A,v:x});j=D.r;o=D.g;t=D.b}}u=u!=null?u:255;m.call(q,r||q)}break}},p=function(h){if(e.isFunction(h)){k.push(h)}},y=function(r){if(!e.isFunction(r)){return}var h;while((h=e.inArray(r,k))!=-1){k.splice(h,1)}},w=function(){k=null};e.extend(true,q,{val:l,bind:p,unbind:y,destroy:w});if(z){if(z.ahex!=null){l("ahex",z)}else{if(z.hex!=null){l((z.a!=null?"a":"")+"hex",z.a!=null?{ahex:z.hex+g.intToHex(z.a)}:z)}else{if(z.r!=null&&z.g!=null&&z.b!=null){l("rgb"+(z.a!=null?"a":""),z)}else{if(z.h!=null&&z.s!=null&&z.v!=null){l("hsv"+(z.a!=null?"a":""),z)}}}}}},ColorMethods:{hexToRgba:function(m){m=this.validateHex(m);if(m==""){return{r:null,g:null,b:null,a:null}}var l="00",k="00",h="00",j="255";if(m.length==6){m+="ff"}if(m.length>6){l=m.substring(0,2);k=m.substring(2,4);h=m.substring(4,6);j=m.substring(6,m.length)}else{if(m.length>4){l=m.substring(4,m.length);m=m.substring(0,4)}if(m.length>2){k=m.substring(2,m.length);m=m.substring(0,2)}if(m.length>0){h=m.substring(0,m.length)}}return{r:this.hexToInt(l),g:this.hexToInt(k),b:this.hexToInt(h),a:this.hexToInt(j)}},validateHex:function(h){h=h.toLowerCase().replace(/[^a-f0-9]/g,"");if(h.length>8){h=h.substring(0,8)}return h},rgbaToHex:function(h){return this.intToHex(h.r)+this.intToHex(h.g)+this.intToHex(h.b)+this.intToHex(h.a)},intToHex:function(j){var h=(j|0).toString(16);if(h.length==1){h=("0"+h)}return h.toLowerCase()},hexToInt:function(h){return parseInt(h,16)},rgbToHsv:function(l){var o=l.r/255,n=l.g/255,j=l.b/255,k={h:0,s:0,v:0},m=0,h=0,p;if(o>=n&&o>=j){h=o;m=n>j?j:n}else{if(n>=j&&n>=o){h=n;m=o>j?j:o}else{h=j;m=n>o?o:n}}k.v=h;k.s=h?(h-m)/h:0;if(!k.s){k.h=0}else{p=h-m;if(o==h){k.h=(n-j)/p}else{if(n==h){k.h=2+(j-o)/p}else{k.h=4+(o-n)/p}}k.h=parseInt(k.h*60);if(k.h<0){k.h+=360}}k.s=(k.s*100)|0;k.v=(k.v*100)|0;return k},hsvToRgb:function(n){var r={r:0,g:0,b:0,a:100},m=n.h,x=n.s,u=n.v;if(x==0){if(u==0){r.r=r.g=r.b=0}else{r.r=r.g=r.b=(u*255/100)|0}}else{if(m==360){m=0}m/=60;x=x/100;u=u/100;var l=m|0,o=m-l,k=u*(1-x),j=u*(1-(x*o)),w=u*(1-(x*(1-o)));switch(l){case 0:r.r=u;r.g=w;r.b=k;break;case 1:r.r=j;r.g=u;r.b=k;break;case 2:r.r=k;r.g=u;r.b=w;break;case 3:r.r=k;r.g=j;r.b=u;break;case 4:r.r=w;r.g=k;r.b=u;break;case 5:r.r=u;r.g=k;r.b=j;break}r.r=(r.r*255)|0;r.g=(r.g*255)|0;r.b=(r.b*255)|0}return r}}};var f=e.jPicker.Color,c=e.jPicker.List,g=e.jPicker.ColorMethods;e.fn.jPicker=function(j){var h=arguments;return this.each(function(){var w=this,av=e.extend(true,{},e.fn.jPicker.defaults,j);if(e(w).get(0).nodeName.toLowerCase()=="input"){e.extend(true,av,{window:{bindToInput:true,expandable:true,input:e(w)}});if(e(w).val()==""){av.color.active=new f({hex:null});av.color.current=new f({hex:null})}else{if(g.validateHex(e(w).val())){av.color.active=new f({hex:e(w).val(),a:av.color.active.val("a")});av.color.current=new f({hex:e(w).val(),a:av.color.active.val("a")})}}}if(av.window.expandable){e(w).after('<span class="jPicker"><span class="Icon"><span class="Color">&nbsp;</span><span class="Alpha">&nbsp;</span><span class="Image" title="Click To Open Color Picker">&nbsp;</span><span class="Container">&nbsp;</span></span></span>')}else{av.window.liveUpdate=false}var Q=parseFloat(navigator.appVersion.split("MSIE")[1])<7&&document.body.filters,R=null,l=null,s=null,au=null,at=null,ar=null,P=null,O=null,N=null,M=null,L=null,K=null,D=null,U=null,aw=null,J=null,I=null,am=null,ai=null,E=null,an=null,ah=null,X=null,ab=null,aq=null,r=null,C=null,u=null,ag=function(aB){var aD=G.active,aE=n.clientPath,aA=aD.val("hex"),aC,az;av.color.mode=aB;switch(aB){case"h":setTimeout(function(){y.call(w,l,"transparent");x.call(w,au,0);Y.call(w,au,100);x.call(w,at,260);Y.call(w,at,100);y.call(w,s,"transparent");x.call(w,P,0);Y.call(w,P,100);x.call(w,O,260);Y.call(w,O,100);x.call(w,N,260);Y.call(w,N,100);x.call(w,M,260);Y.call(w,M,100);x.call(w,K,260);Y.call(w,K,100)},0);D.range("all",{minX:0,maxX:100,minY:0,maxY:100});U.range("rangeY",{minY:0,maxY:360});if(aD.val("ahex")==null){break}D.val("xy",{x:aD.val("s"),y:100-aD.val("v")},D);U.val("y",360-aD.val("h"),U);break;case"s":setTimeout(function(){y.call(w,l,"transparent");x.call(w,au,-260);x.call(w,at,-520);x.call(w,P,-260);x.call(w,O,-520);x.call(w,K,260);Y.call(w,K,100)},0);D.range("all",{minX:0,maxX:360,minY:0,maxY:100});U.range("rangeY",{minY:0,maxY:100});if(aD.val("ahex")==null){break}D.val("xy",{x:aD.val("h"),y:100-aD.val("v")},D);U.val("y",100-aD.val("s"),U);break;case"v":setTimeout(function(){y.call(w,l,"000000");x.call(w,au,-780);x.call(w,at,260);y.call(w,s,aA);x.call(w,P,-520);x.call(w,O,260);Y.call(w,O,100);x.call(w,K,260);Y.call(w,K,100)},0);D.range("all",{minX:0,maxX:360,minY:0,maxY:100});U.range("rangeY",{minY:0,maxY:100});if(aD.val("ahex")==null){break}D.val("xy",{x:aD.val("h"),y:100-aD.val("s")},D);U.val("y",100-aD.val("v"),U);break;case"r":aC=-1040;az=-780;D.range("all",{minX:0,maxX:255,minY:0,maxY:255});U.range("rangeY",{minY:0,maxY:255});if(aD.val("ahex")==null){break}D.val("xy",{x:aD.val("b"),y:255-aD.val("g")},D);U.val("y",255-aD.val("r"),U);break;case"g":aC=-1560;az=-1820;D.range("all",{minX:0,maxX:255,minY:0,maxY:255});U.range("rangeY",{minY:0,maxY:255});if(aD.val("ahex")==null){break}D.val("xy",{x:aD.val("b"),y:255-aD.val("r")},D);U.val("y",255-aD.val("g"),U);break;case"b":aC=-2080;az=-2860;D.range("all",{minX:0,maxX:255,minY:0,maxY:255});U.range("rangeY",{minY:0,maxY:255});if(aD.val("ahex")==null){break}D.val("xy",{x:aD.val("r"),y:255-aD.val("g")},D);U.val("y",255-aD.val("b"),U);break;case"a":setTimeout(function(){y.call(w,l,"transparent");x.call(w,au,-260);x.call(w,at,-520);x.call(w,P,260);x.call(w,O,260);Y.call(w,O,100);x.call(w,K,0);Y.call(w,K,100)},0);D.range("all",{minX:0,maxX:360,minY:0,maxY:100});U.range("rangeY",{minY:0,maxY:255});if(aD.val("ahex")==null){break}D.val("xy",{x:aD.val("h"),y:100-aD.val("v")},D);U.val("y",255-aD.val("a"),U);break;default:throw ("Invalid Mode");break}switch(aB){case"h":break;case"s":case"v":case"a":setTimeout(function(){Y.call(w,au,100);Y.call(w,P,100);x.call(w,N,260);Y.call(w,N,100);x.call(w,M,260);Y.call(w,M,100)},0);break;case"r":case"g":case"b":setTimeout(function(){y.call(w,l,"transparent");y.call(w,s,"transparent");Y.call(w,P,100);Y.call(w,au,100);x.call(w,au,aC);x.call(w,at,aC-260);x.call(w,P,az-780);x.call(w,O,az-520);x.call(w,N,az);x.call(w,M,az-260);x.call(w,K,260);Y.call(w,K,100)},0);break}if(aD.val("ahex")==null){return}aj.call(w,aD)},aj=function(aA,az){if(az==null||(az!=U&&az!=D)){v.call(w,aA,az)}setTimeout(function(){ay.call(w,aA);al.call(w,aA);W.call(w,aA)},0)},z=function(aA,az){var aC=G.active;if(az!=D&&aC.val()==null){return}var aB=aA.val("all");switch(av.color.mode){case"h":aC.val("sv",{s:aB.x,v:100-aB.y},az);break;case"s":case"a":aC.val("hv",{h:aB.x,v:100-aB.y},az);break;case"v":aC.val("hs",{h:aB.x,s:100-aB.y},az);break;case"r":aC.val("gb",{g:255-aB.y,b:aB.x},az);break;case"g":aC.val("rb",{r:255-aB.y,b:aB.x},az);break;case"b":aC.val("rg",{r:aB.x,g:255-aB.y},az);break}},ac=function(aA,az){var aB=G.active;if(az!=U&&aB.val()==null){return}switch(av.color.mode){case"h":aB.val("h",{h:360-aA.val("y")},az);break;case"s":aB.val("s",{s:100-aA.val("y")},az);break;case"v":aB.val("v",{v:100-aA.val("y")},az);break;case"r":aB.val("r",{r:255-aA.val("y")},az);break;case"g":aB.val("g",{g:255-aA.val("y")},az);break;case"b":aB.val("b",{b:255-aA.val("y")},az);break;case"a":aB.val("a",255-aA.val("y"),az);break}},v=function(aC,az){if(az!=D){switch(av.color.mode){case"h":var aH=aC.val("sv");D.val("xy",{x:aH!=null?aH.s:100,y:100-(aH!=null?aH.v:100)},az);break;case"s":case"a":var aB=aC.val("hv");D.val("xy",{x:aB&&aB.h||0,y:100-(aB!=null?aB.v:100)},az);break;case"v":var aE=aC.val("hs");D.val("xy",{x:aE&&aE.h||0,y:100-(aE!=null?aE.s:100)},az);break;case"r":var aA=aC.val("bg");D.val("xy",{x:aA&&aA.b||0,y:255-(aA&&aA.g||0)},az);break;case"g":var aI=aC.val("br");D.val("xy",{x:aI&&aI.b||0,y:255-(aI&&aI.r||0)},az);break;case"b":var aG=aC.val("rg");D.val("xy",{x:aG&&aG.r||0,y:255-(aG&&aG.g||0)},az);break}}if(az!=U){switch(av.color.mode){case"h":U.val("y",360-(aC.val("h")||0),az);break;case"s":var aJ=aC.val("s");U.val("y",100-(aJ!=null?aJ:100),az);break;case"v":var aF=aC.val("v");U.val("y",100-(aF!=null?aF:100),az);break;case"r":U.val("y",255-(aC.val("r")||0),az);break;case"g":U.val("y",255-(aC.val("g")||0),az);break;case"b":U.val("y",255-(aC.val("b")||0),az);break;case"a":var aD=aC.val("a");U.val("y",255-(aD!=null?aD:255),az);break}}},ay=function(aA){try{var az=aA.val("all");E.css({backgroundColor:az&&"#"+az.hex||"transparent"});Y.call(w,E,az&&Math.precision((az.a*100)/255,4)||0)}catch(aB){}},al=function(aC){switch(av.color.mode){case"h":y.call(w,l,new f({h:aC.val("h")||0,s:100,v:100}).val("hex"));break;case"s":case"a":var aB=aC.val("s");Y.call(w,at,100-(aB!=null?aB:100));break;case"v":var aA=aC.val("v");Y.call(w,au,aA!=null?aA:100);break;case"r":Y.call(w,at,Math.precision((aC.val("r")||0)/255*100,4));break;case"g":Y.call(w,at,Math.precision((aC.val("g")||0)/255*100,4));break;case"b":Y.call(w,at,Math.precision((aC.val("b")||0)/255*100));break}var az=aC.val("a");Y.call(w,ar,Math.precision(((255-(az||0))*100)/255,4))},W=function(aF){switch(av.color.mode){case"h":var aH=aF.val("a");Y.call(w,L,Math.precision(((255-(aH||0))*100)/255,4));break;case"s":var aA=aF.val("hva"),aB=new f({h:aA&&aA.h||0,s:100,v:aA!=null?aA.v:100});y.call(w,s,aB.val("hex"));Y.call(w,O,100-(aA!=null?aA.v:100));Y.call(w,L,Math.precision(((255-(aA&&aA.a||0))*100)/255,4));break;case"v":var aC=aF.val("hsa"),aE=new f({h:aC&&aC.h||0,s:aC!=null?aC.s:100,v:100});y.call(w,s,aE.val("hex"));Y.call(w,L,Math.precision(((255-(aC&&aC.a||0))*100)/255,4));break;case"r":case"g":case"b":var aD=0,aG=0,az=aF.val("rgba");if(av.color.mode=="r"){aD=az&&az.b||0;aG=az&&az.g||0}else{if(av.color.mode=="g"){aD=az&&az.b||0;aG=az&&az.r||0}else{if(av.color.mode=="b"){aD=az&&az.r||0;aG=az&&az.g||0}}}var aI=aG>aD?aD:aG;Y.call(w,O,aD>aG?Math.precision(((aD-aG)/(255-aG))*100,4):0);Y.call(w,N,aG>aD?Math.precision(((aG-aD)/(255-aD))*100,4):0);Y.call(w,M,Math.precision((aI/255)*100,4));Y.call(w,L,Math.precision(((255-(az&&az.a||0))*100)/255,4));break;case"a":var aH=aF.val("a");y.call(w,s,aF.val("hex")||"000000");Y.call(w,L,aH!=null?0:100);Y.call(w,K,aH!=null?100:0);break}},y=function(az,aA){az.css({backgroundColor:aA&&aA.length==6&&"#"+aA||"transparent"})},t=function(az,aA){if(Q&&(aA.indexOf("AlphaBar.png")!=-1||aA.indexOf("Bars.png")!=-1||aA.indexOf("Maps.png")!=-1)){az.attr("pngSrc",aA);az.css({backgroundImage:"none",filter:"progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+aA+"', sizingMethod='scale')"})}else{az.css({backgroundImage:"url('"+aA+"')"})}},x=function(az,aA){az.css({top:aA+"px"})},Y=function(aA,az){aA.css({visibility:az>0?"visible":"hidden"});if(az>0&&az<100){if(Q){var aB=aA.attr("pngSrc");if(aB!=null&&(aB.indexOf("AlphaBar.png")!=-1||aB.indexOf("Bars.png")!=-1||aB.indexOf("Maps.png")!=-1)){aA.css({filter:"progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+aB+"', sizingMethod='scale') progid:DXImageTransform.Microsoft.Alpha(opacity="+az+")"})}else{aA.css({opacity:Math.precision(az/100,4)})}}else{aA.css({opacity:Math.precision(az/100,4)})}}else{if(az==0||az==100){if(Q){var aB=aA.attr("pngSrc");if(aB!=null&&(aB.indexOf("AlphaBar.png")!=-1||aB.indexOf("Bars.png")!=-1||aB.indexOf("Maps.png")!=-1)){aA.css({filter:"progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+aB+"', sizingMethod='scale')"})}else{aA.css({opacity:""})}}else{aA.css({opacity:""})}}}},B=function(){G.active.val("ahex",G.current.val("ahex"))},T=function(){G.current.val("ahex",G.active.val("ahex"))},A=function(az){e(this).parents("tbody:first").find('input:radio[value!="'+az.target.value+'"]').removeAttr("checked");ag.call(w,az.target.value)},Z=function(){B.call(w)},q=function(){B.call(w);av.window.expandable&&ao.call(w);e.isFunction(ax)&&ax.call(w,G.active,X)},m=function(){T.call(w);av.window.expandable&&ao.call(w);e.isFunction(ae)&&ae.call(w,G.active,ah)},af=function(){V.call(w)},ap=function(aB,az){var aA=aB.val("hex");an.css({backgroundColor:aA&&"#"+aA||"transparent"});Y.call(w,an,Math.precision(((aB.val("a")||0)*100)/255,4))},H=function(aC,az){var aB=aC.val("hex");var aA=aC.val("va");aq.css({backgroundColor:aB&&"#"+aB||"transparent"});Y.call(w,r,Math.precision(((255-(aA&&aA.a||0))*100)/255,4));if(av.window.bindToInput&&av.window.updateInputColor){av.window.input.css({backgroundColor:aB&&"#"+aB||"transparent",color:aA==null||aA.v>75?"#000000":"#ffffff"})}},S=function(aB){var az=av.window.element,aA=av.window.page;J=parseInt(R.css("left"));I=parseInt(R.css("top"));am=aB.pageX;ai=aB.pageY;e(document).bind("mousemove",k).bind("mouseup",p);aB.preventDefault()},k=function(az){R.css({left:J-(am-az.pageX)+"px",top:I-(ai-az.pageY)+"px"});if(av.window.expandable&&!e.support.boxModel){R.prev().css({left:R.css("left"),top:R.css("top")})}az.stopPropagation();az.preventDefault();return false},p=function(az){e(document).unbind("mousemove",k).unbind("mouseup",p);az.stopPropagation();az.preventDefault();return false},F=function(az){az.preventDefault();az.stopPropagation();G.active.val("ahex",e(this).attr("title")||null,az.target);return false},ae=e.isFunction(h[1])&&h[1]||null,ad=e.isFunction(h[2])&&h[2]||null,ax=e.isFunction(h[3])&&h[3]||null,V=function(){G.current.val("ahex",G.active.val("ahex"));var az=function(){if(!av.window.expandable||e.support.boxModel){return}var aA=R.find("table:first");R.before("<iframe/>");R.prev().css({width:aA.width(),height:R.height(),opacity:0,position:"absolute",left:R.css("left"),top:R.css("top")})};if(av.window.expandable){e(document.body).children("div.jPicker.Container").css({zIndex:10});R.css({zIndex:20})}switch(av.window.effects.type){case"fade":R.fadeIn(av.window.effects.speed.show,az);break;case"slide":R.slideDown(av.window.effects.speed.show,az);break;case"show":default:R.show(av.window.effects.speed.show,az);break}},ao=function(){var az=function(){if(av.window.expandable){R.css({zIndex:10})}if(!av.window.expandable||e.support.boxModel){return}R.prev().remove()};switch(av.window.effects.type){case"fade":R.fadeOut(av.window.effects.speed.hide,az);break;case"slide":R.slideUp(av.window.effects.speed.hide,az);break;case"show":default:R.hide(av.window.effects.speed.hide,az);break}},o=function(){var aG=av.window,az=aG.expandable?e(w).next().find(".Container:first"):null;R=aG.expandable?e("<div/>"):e(w);R.addClass("jPicker Container");if(aG.expandable){R.hide()}R.get(0).onselectstart=function(aN){if(aN.target.nodeName.toLowerCase()!=="input"){return false}};var aJ=G.active.val("all");if(aG.alphaPrecision<0){aG.alphaPrecision=0}else{if(aG.alphaPrecision>2){aG.alphaPrecision=2}}var aK='<table class="jPicker" cellpadding="0" cellspacing="0"><tbody>'+(aG.expandable?'<tr><td class="Move" colspan="5">&nbsp;</td></tr>':"")+'<tr><td rowspan="9"><h2 class="Title">'+(aG.title||aa.text.title)+'</h2><div class="Map"><span class="Map1">&nbsp;</span><span class="Map2">&nbsp;</span><span class="Map3">&nbsp;</span><img src="'+n.clientPath+n.colorMap.arrow.file+'" class="Arrow"/></div></td><td rowspan="9"><div class="Bar"><span class="Map1">&nbsp;</span><span class="Map2">&nbsp;</span><span class="Map3">&nbsp;</span><span class="Map4">&nbsp;</span><span class="Map5">&nbsp;</span><span class="Map6">&nbsp;</span><img src="'+n.clientPath+n.colorBar.arrow.file+'" class="Arrow"/></div></td><td colspan="2" class="Preview">'+aa.text.newColor+'<div><span class="Active" title="'+aa.tooltips.colors.newColor+'">&nbsp;</span><span class="Current" title="'+aa.tooltips.colors.currentColor+'">&nbsp;</span></div>'+aa.text.currentColor+'</td><td rowspan="9" class="Button"><input type="button" class="Ok" value="'+aa.text.ok+'" title="'+aa.tooltips.buttons.ok+'"/><input type="button" class="Cancel" value="'+aa.text.cancel+'" title="'+aa.tooltips.buttons.cancel+'"/><hr/><div class="Grid">&nbsp;</div></td></tr><tr class="Hue"><td class="Radio"><label title="'+aa.tooltips.hue.radio+'"><input type="radio" value="h"'+(av.color.mode=="h"?' checked="checked"':"")+'/>H:</label></td><td class="Text"><input type="text" maxlength="3" value="'+(aJ!=null?aJ.h:"")+'" title="'+aa.tooltips.hue.textbox+'"/>&nbsp;&deg;</td></tr><tr class="Saturation"><td class="Radio"><label title="'+aa.tooltips.saturation.radio+'"><input type="radio" value="s"'+(av.color.mode=="s"?' checked="checked"':"")+'/>S:</label></td><td class="Text"><input type="text" maxlength="3" value="'+(aJ!=null?aJ.s:"")+'" title="'+aa.tooltips.saturation.textbox+'"/>&nbsp;%</td></tr><tr class="Value"><td class="Radio"><label title="'+aa.tooltips.value.radio+'"><input type="radio" value="v"'+(av.color.mode=="v"?' checked="checked"':"")+'/>V:</label><br/><br/></td><td class="Text"><input type="text" maxlength="3" value="'+(aJ!=null?aJ.v:"")+'" title="'+aa.tooltips.value.textbox+'"/>&nbsp;%<br/><br/></td></tr><tr class="Red"><td class="Radio"><label title="'+aa.tooltips.red.radio+'"><input type="radio" value="r"'+(av.color.mode=="r"?' checked="checked"':"")+'/>R:</label></td><td class="Text"><input type="text" maxlength="3" value="'+(aJ!=null?aJ.r:"")+'" title="'+aa.tooltips.red.textbox+'"/></td></tr><tr class="Green"><td class="Radio"><label title="'+aa.tooltips.green.radio+'"><input type="radio" value="g"'+(av.color.mode=="g"?' checked="checked"':"")+'/>G:</label></td><td class="Text"><input type="text" maxlength="3" value="'+(aJ!=null?aJ.g:"")+'" title="'+aa.tooltips.green.textbox+'"/></td></tr><tr class="Blue"><td class="Radio"><label title="'+aa.tooltips.blue.radio+'"><input type="radio" value="b"'+(av.color.mode=="b"?' checked="checked"':"")+'/>B:</label></td><td class="Text"><input type="text" maxlength="3" value="'+(aJ!=null?aJ.b:"")+'" title="'+aa.tooltips.blue.textbox+'"/></td></tr><tr class="Alpha"><td class="Radio">'+(aG.alphaSupport?'<label title="'+aa.tooltips.alpha.radio+'"><input type="radio" value="a"'+(av.color.mode=="a"?' checked="checked"':"")+"/>A:</label>":"&nbsp;")+'</td><td class="Text">'+(aG.alphaSupport?'<input type="text" maxlength="'+(3+aG.alphaPrecision)+'" value="'+(aJ!=null?Math.precision((aJ.a*100)/255,aG.alphaPrecision):"")+'" title="'+aa.tooltips.alpha.textbox+'"/>&nbsp;%':"&nbsp;")+'</td></tr><tr class="Hex"><td colspan="2" class="Text"><label title="'+aa.tooltips.hex.textbox+'">#:<input type="text" maxlength="6" class="Hex" value="'+(aJ!=null?aJ.hex:"")+'"/></label>'+(aG.alphaSupport?'<input type="text" maxlength="2" class="AHex" value="'+(aJ!=null?aJ.ahex.substring(6):"")+'" title="'+aa.tooltips.hex.alpha+'"/></td>':"&nbsp;")+"</tr></tbody></table>";if(aG.expandable){R.html(aK);if(e(document.body).children("div.jPicker.Container").length==0){e(document.body).prepend(R)}else{e(document.body).children("div.jPicker.Container:last").after(R)}R.mousedown(function(){e(document.body).children("div.jPicker.Container").css({zIndex:10});R.css({zIndex:20})});R.css({left:aG.position.x=="left"?(az.offset().left-530-(aG.position.y=="center"?25:0))+"px":aG.position.x=="center"?(az.offset().left-260)+"px":aG.position.x=="right"?(az.offset().left-10+(aG.position.y=="center"?25:0))+"px":aG.position.x=="screenCenter"?((e(document).width()>>1)-260)+"px":(az.offset().left+parseInt(aG.position.x))+"px",position:"absolute",top:aG.position.y=="top"?(az.offset().top-312)+"px":aG.position.y=="center"?(az.offset().top-156)+"px":aG.position.y=="bottom"?(az.offset().top+25)+"px":(az.offset().top+parseInt(aG.position.y))+"px"})}else{R=e(w);R.html(aK)}var aD=R.find("tbody:first");l=aD.find("div.Map:first");s=aD.find("div.Bar:first");var aL=l.find("span"),aI=s.find("span");au=aL.filter(".Map1:first");at=aL.filter(".Map2:first");ar=aL.filter(".Map3:first");P=aI.filter(".Map1:first");O=aI.filter(".Map2:first");N=aI.filter(".Map3:first");M=aI.filter(".Map4:first");L=aI.filter(".Map5:first");K=aI.filter(".Map6:first");D=new d(l,{map:{width:n.colorMap.width,height:n.colorMap.height},arrow:{image:n.clientPath+n.colorMap.arrow.file,width:n.colorMap.arrow.width,height:n.colorMap.arrow.height}});D.bind(z);U=new d(s,{map:{width:n.colorBar.width,height:n.colorBar.height},arrow:{image:n.clientPath+n.colorBar.arrow.file,width:n.colorBar.arrow.width,height:n.colorBar.arrow.height}});U.bind(ac);aw=new b(aD,G.active,aG.expandable&&aG.bindToInput?aG.input:null,aG.alphaPrecision);var aB=aJ!=null?aJ.hex:null,aH=aD.find(".Preview"),aF=aD.find(".Button");E=aH.find(".Active:first").css({backgroundColor:aB&&"#"+aB||"transparent"});an=aH.find(".Current:first").css({backgroundColor:aB&&"#"+aB||"transparent"}).bind("click",Z);Y.call(w,an,Math.precision(G.current.val("a")*100)/255,4);ah=aF.find(".Ok:first").bind("click",m);X=aF.find(".Cancel:first").bind("click",q);ab=aF.find(".Grid:first");setTimeout(function(){t.call(w,au,n.clientPath+"Maps.png");t.call(w,at,n.clientPath+"Maps.png");t.call(w,ar,n.clientPath+"map-opacity.png");t.call(w,P,n.clientPath+"Bars.png");t.call(w,O,n.clientPath+"Bars.png");t.call(w,N,n.clientPath+"Bars.png");t.call(w,M,n.clientPath+"Bars.png");t.call(w,L,n.clientPath+"bar-opacity.png");t.call(w,K,n.clientPath+"AlphaBar.png");t.call(w,aH.find("div:first"),n.clientPath+"preview-opacity.png")},0);aD.find("td.Radio input").bind("click",A);if(G.quickList&&G.quickList.length>0){var aE="";for(i=0;i<G.quickList.length;i++){if((typeof(G.quickList[i])).toString().toLowerCase()=="string"){G.quickList[i]=new f({hex:G.quickList[i]})}var aC=G.quickList[i].val("a");var aM=G.quickList[i].val("ahex");if(!aG.alphaSupport&&aM){aM=aM.substring(0,6)+"ff"}var aA=G.quickList[i].val("hex");aE+='<span class="QuickColor"'+(aM&&' title="#'+aM+'"'||"")+' style="background-color:'+(aA&&"#"+aA||"")+";"+(aA?"":"background-image:url("+n.clientPath+"NoColor.png)")+(aG.alphaSupport&&aC&&aC<255?";opacity:"+Math.precision(aC/255,4)+";filter:Alpha(opacity="+Math.precision(aC/2.55,4)+")":"")+'">&nbsp;</span>'}t.call(w,ab,n.clientPath+"bar-opacity.png");ab.html(aE);ab.find(".QuickColor").click(F)}ag.call(w,av.color.mode);G.active.bind(aj);e.isFunction(ad)&&G.active.bind(ad);G.current.bind(ap);if(aG.expandable){w.icon=az.parents(".Icon:first");aq=w.icon.find(".Color:first").css({backgroundColor:aB&&"#"+aB||"transparent"});r=w.icon.find(".Alpha:first");t.call(w,r,n.clientPath+"bar-opacity.png");Y.call(w,r,Math.precision(((255-(aJ!=null?aJ.a:0))*100)/255,4));C=w.icon.find(".Image:first").css({backgroundImage:"url('"+n.clientPath+n.picker.file+"')"}).bind("click",af);if(aG.bindToInput&&aG.updateInputColor){aG.input.css({backgroundColor:aB&&"#"+aB||"transparent",color:aJ==null||aJ.v>75?"#000000":"#ffffff"})}u=aD.find(".Move:first").bind("mousedown",S);G.active.bind(H)}else{V.call(w)}},ak=function(){R.find("td.Radio input").unbind("click",A);an.unbind("click",Z);X.unbind("click",q);ah.unbind("click",m);if(av.window.expandable){C.unbind("click",af);u.unbind("mousedown",S);w.icon=null}R.find(".QuickColor").unbind("click",F);l=null;s=null;au=null;at=null;ar=null;P=null;O=null;N=null;M=null;L=null;K=null;D.destroy();D=null;U.destroy();U=null;aw.destroy();aw=null;E=null;an=null;ah=null;X=null;ab=null;ae=null;ax=null;ad=null;R.html("");for(i=0;i<c.length;i++){if(c[i]==w){c.splice(i,1)}}},n=av.images,aa=av.localization,G={active:(typeof(av.color.active)).toString().toLowerCase()=="string"?new f({ahex:!av.window.alphaSupport&&av.color.active?av.color.active.substring(0,6)+"ff":av.color.active}):new f({ahex:!av.window.alphaSupport&&av.color.active.val("ahex")?av.color.active.val("ahex").substring(0,6)+"ff":av.color.active.val("ahex")}),current:(typeof(av.color.active)).toString().toLowerCase()=="string"?new f({ahex:!av.window.alphaSupport&&av.color.active?av.color.active.substring(0,6)+"ff":av.color.active}):new f({ahex:!av.window.alphaSupport&&av.color.active.val("ahex")?av.color.active.val("ahex").substring(0,6)+"ff":av.color.active.val("ahex")}),quickList:av.color.quickList};e.extend(true,w,{commitCallback:ae,liveCallback:ad,cancelCallback:ax,color:G,show:V,hide:ao,destroy:ak});c.push(w);setTimeout(function(){o.call(w)},0)})};e.fn.jPicker.defaults={window:{title:null,effects:{type:"slide",speed:{show:"slow",hide:"fast"}},position:{x:"screenCenter",y:"top"},expandable:false,liveUpdate:true,alphaSupport:false,alphaPrecision:0,updateInputColor:true},color:{mode:"h",active:new f({ahex:"#ffcc00ff"}),quickList:[new f({h:360,s:33,v:100}),new f({h:360,s:66,v:100}),new f({h:360,s:100,v:100}),new f({h:360,s:100,v:75}),new f({h:360,s:100,v:50}),new f({h:180,s:0,v:100}),new f({h:30,s:33,v:100}),new f({h:30,s:66,v:100}),new f({h:30,s:100,v:100}),new f({h:30,s:100,v:75}),new f({h:30,s:100,v:50}),new f({h:180,s:0,v:90}),new f({h:60,s:33,v:100}),new f({h:60,s:66,v:100}),new f({h:60,s:100,v:100}),new f({h:60,s:100,v:75}),new f({h:60,s:100,v:50}),new f({h:180,s:0,v:80}),new f({h:90,s:33,v:100}),new f({h:90,s:66,v:100}),new f({h:90,s:100,v:100}),new f({h:90,s:100,v:75}),new f({h:90,s:100,v:50}),new f({h:180,s:0,v:70}),new f({h:120,s:33,v:100}),new f({h:120,s:66,v:100}),new f({h:120,s:100,v:100}),new f({h:120,s:100,v:75}),new f({h:120,s:100,v:50}),new f({h:180,s:0,v:60}),new f({h:150,s:33,v:100}),new f({h:150,s:66,v:100}),new f({h:150,s:100,v:100}),new f({h:150,s:100,v:75}),new f({h:150,s:100,v:50}),new f({h:180,s:0,v:50}),new f({h:180,s:33,v:100}),new f({h:180,s:66,v:100}),new f({h:180,s:100,v:100}),new f({h:180,s:100,v:75}),new f({h:180,s:100,v:50}),new f({h:180,s:0,v:40}),new f({h:210,s:33,v:100}),new f({h:210,s:66,v:100}),new f({h:210,s:100,v:100}),new f({h:210,s:100,v:75}),new f({h:210,s:100,v:50}),new f({h:180,s:0,v:30}),new f({h:240,s:33,v:100}),new f({h:240,s:66,v:100}),new f({h:240,s:100,v:100}),new f({h:240,s:100,v:75}),new f({h:240,s:100,v:50}),new f({h:180,s:0,v:20}),new f({h:270,s:33,v:100}),new f({h:270,s:66,v:100}),new f({h:270,s:100,v:100}),new f({h:270,s:100,v:75}),new f({h:270,s:100,v:50}),new f({h:180,s:0,v:10}),new f({h:300,s:33,v:100}),new f({h:300,s:66,v:100}),new f({h:300,s:100,v:100}),new f({h:300,s:100,v:75}),new f({h:300,s:100,v:50}),new f({h:180,s:0,v:0}),new f({h:330,s:33,v:100}),new f({h:330,s:66,v:100}),new f({h:330,s:100,v:100}),new f({h:330,s:100,v:75}),new f({h:330,s:100,v:50}),new f()]},images:{clientPath:"/jPicker/images/",colorMap:{width:256,height:256,arrow:{file:"mappoint.gif",width:15,height:15}},colorBar:{width:20,height:256,arrow:{file:"rangearrows.gif",width:20,height:7}},picker:{file:"picker.gif",width:25,height:24}},localization:{text:{title:"Drag Markers To Pick A Color",newColor:"new",currentColor:"current",ok:"OK",cancel:"Cancel"},tooltips:{colors:{newColor:"New Color - Press &ldquo;OK&rdquo; To Commit",currentColor:"Click To Revert To Original Color"},buttons:{ok:"Commit To This Color Selection",cancel:"Cancel And Revert To Original Color"},hue:{radio:"Set To &ldquo;Hue&rdquo; Color Mode",textbox:"Enter A &ldquo;Hue&rdquo; Value (0-360&deg;)"},saturation:{radio:"Set To &ldquo;Saturation&rdquo; Color Mode",textbox:"Enter A &ldquo;Saturation&rdquo; Value (0-100%)"},value:{radio:"Set To &ldquo;Value&rdquo; Color Mode",textbox:"Enter A &ldquo;Value&rdquo; Value (0-100%)"},red:{radio:"Set To &ldquo;Red&rdquo; Color Mode",textbox:"Enter A &ldquo;Red&rdquo; Value (0-255)"},green:{radio:"Set To &ldquo;Green&rdquo; Color Mode",textbox:"Enter A &ldquo;Green&rdquo; Value (0-255)"},blue:{radio:"Set To &ldquo;Blue&rdquo; Color Mode",textbox:"Enter A &ldquo;Blue&rdquo; Value (0-255)"},alpha:{radio:"Set To &ldquo;Alpha&rdquo; Color Mode",textbox:"Enter A &ldquo;Alpha&rdquo; Value (0-100)"},hex:{textbox:"Enter A &ldquo;Hex&rdquo; Color Value (#000000-#ffffff)",alpha:"Enter A &ldquo;Alpha&rdquo; Value (#00-#ff)"}}}}})(jQuery,"1.1.6");

/*
 * Depend Class v0.1b : attach class based on first class in list of current element
 * File: jquery.dependClass.js
 * Copyright (c) 2009 Egor Hmelyoff, hmelyoff@gmail.com
 */
(function($) {
	// Init plugin function
	$.baseClass = function(obj){
	  obj = $(obj);
	  return obj.get(0).className.match(/([^ ]+)/)[1];
	};
	
	$.fn.addDependClass = function(className, delimiter){
		var options = {
		  delimiter: delimiter ? delimiter : '-'
		}
		return this.each(function(){
		  var baseClass = $.baseClass(this);
		  if(baseClass)
    		$(this).addClass(baseClass + options.delimiter + className);
		});
	};

	$.fn.removeDependClass = function(className, delimiter){
		var options = {
		  delimiter: delimiter ? delimiter : '-'
		}
		return this.each(function(){
		  var baseClass = $.baseClass(this);
		  if(baseClass)
    		$(this).removeClass(baseClass + options.delimiter + className);
		});
	};

	$.fn.toggleDependClass = function(className, delimiter){
		var options = {
		  delimiter: delimiter ? delimiter : '-'
		}
		return this.each(function(){
		  var baseClass = $.baseClass(this);
		  if(baseClass)
		    if($(this).is("." + baseClass + options.delimiter + className))
    		  $(this).removeClass(baseClass + options.delimiter + className);
    		else
    		  $(this).addClass(baseClass + options.delimiter + className);
		});
	};

	// end of closure
})(jQuery);

// jQuery Slider Plugin
// Egor Khmelev - http://blog.egorkhmelev.com/ - hmelyoff@gmail.com
(function(){Function.prototype.inheritFrom=function(b,c){var d=function(){};d.prototype=b.prototype;this.prototype=new d();this.prototype.constructor=this;this.prototype.baseConstructor=b;this.prototype.superClass=b.prototype;if(c){for(var a in c){this.prototype[a]=c[a]}}};Number.prototype.jSliderNice=function(l){var o=/^(-)?(\d+)([\.,](\d+))?$/;var d=Number(this);var j=String(d);var k;var c="";var b=" ";if((k=j.match(o))){var f=k[2];var m=(k[4])?Number("0."+k[4]):0;if(m){var e=Math.pow(10,(l)?l:2);m=Math.round(m*e);sNewDecPart=String(m);c=sNewDecPart;if(sNewDecPart.length<l){var a=l-sNewDecPart.length;for(var g=0;g<a;g++){c="0"+c}}c=","+c}else{if(l&&l!=0){for(var g=0;g<l;g++){c+="0"}c=","+c}}var h;if(Number(f)<1000){h=f+c}else{var n="";var g;for(g=1;g*3<f.length;g++){n=b+f.substring(f.length-g*3,f.length-(g-1)*3)+n}h=f.substr(0,3-g*3+f.length)+n+c}if(k[1]){return"-"+h}else{return h}}else{return j}};this.jSliderIsArray=function(a){if(typeof a=="undefined"){return false}if(a instanceof Array||(!(a instanceof Object)&&(Object.prototype.toString.call((a))=="[object Array]")||typeof a.length=="number"&&typeof a.splice!="undefined"&&typeof a.propertyIsEnumerable!="undefined"&&!a.propertyIsEnumerable("splice"))){return true}return false}})();(function(){var a={};this.jSliderTmpl=function b(e,d){var c=!(/\W/).test(e)?a[e]=a[e]||b(e):new Function("obj","var p=[],print=function(){p.push.apply(p,arguments);};with(obj){p.push('"+e.replace(/[\r\t\n]/g," ").split("<%").join("\t").replace(/((^|%>)[^\t]*)'/g,"$1\r").replace(/\t=(.*?)%>/g,"',$1,'").split("\t").join("');").split("%>").join("p.push('").split("\r").join("\\'")+"');}return p.join('');");return d?c(d):c}})();(function(a){this.Draggable=function(){this._init.apply(this,arguments)};Draggable.prototype={oninit:function(){},events:function(){},onmousedown:function(){this.ptr.css({position:"absolute"})},onmousemove:function(c,b,d){this.ptr.css({left:b,top:d})},onmouseup:function(){},isDefault:{drag:false,clicked:false,toclick:true,mouseup:false},_init:function(){if(arguments.length>0){this.ptr=a(arguments[0]);this.outer=a(".draggable-outer");this.is={};a.extend(this.is,this.isDefault);var b=this.ptr.offset();this.d={left:b.left,top:b.top,width:this.ptr.width(),height:this.ptr.height()};this.oninit.apply(this,arguments);this._events()}},_getPageCoords:function(b){if(b.targetTouches&&b.targetTouches[0]){return{x:b.targetTouches[0].pageX,y:b.targetTouches[0].pageY}}else{return{x:b.pageX,y:b.pageY}}},_bindEvent:function(e,c,d){var b=this;if(this.supportTouches_){e.get(0).addEventListener(this.events_[c],d,false)}else{e.bind(this.events_[c],d)}},_events:function(){var b=this;this.supportTouches_=(a.browser.webkit&&navigator.userAgent.indexOf("Mobile")!=-1);this.events_={click:this.supportTouches_?"touchstart":"click",down:this.supportTouches_?"touchstart":"mousedown",move:this.supportTouches_?"touchmove":"mousemove",up:this.supportTouches_?"touchend":"mouseup"};this._bindEvent(a(document),"move",function(c){if(b.is.drag){c.stopPropagation();c.preventDefault();b._mousemove(c)}});this._bindEvent(a(document),"down",function(c){if(b.is.drag){c.stopPropagation();c.preventDefault()}});this._bindEvent(a(document),"up",function(c){b._mouseup(c)});this._bindEvent(this.ptr,"down",function(c){b._mousedown(c);return false});this._bindEvent(this.ptr,"up",function(c){b._mouseup(c)});this.ptr.find("a").click(function(){b.is.clicked=true;if(!b.is.toclick){b.is.toclick=true;return false}}).mousedown(function(c){b._mousedown(c);return false});this.events()},_mousedown:function(b){this.is.drag=true;this.is.clicked=false;this.is.mouseup=false;var c=this.ptr.offset();var d=this._getPageCoords(b);this.cx=d.x-c.left;this.cy=d.y-c.top;a.extend(this.d,{left:c.left,top:c.top,width:this.ptr.width(),height:this.ptr.height()});if(this.outer&&this.outer.get(0)){this.outer.css({height:Math.max(this.outer.height(),a(document.body).height()),overflow:"hidden"})}this.onmousedown(b)},_mousemove:function(b){this.is.toclick=false;var c=this._getPageCoords(b);this.onmousemove(b,c.x-this.cx,c.y-this.cy)},_mouseup:function(b){var c=this;if(this.is.drag){this.is.drag=false;if(this.outer&&this.outer.get(0)){if(a.browser.mozilla){this.outer.css({overflow:"hidden"})}else{this.outer.css({overflow:"visible"})}if(a.browser.msie&&a.browser.version=="6.0"){this.outer.css({height:"100%"})}else{this.outer.css({height:"auto"})}}this.onmouseup(b)}}}})(jQuery);(function(b){b.slider=function(f,e){var d=b(f);if(!d.data("jslider")){d.data("jslider",new jSlider(f,e))}return d.data("jslider")};b.fn.slider=function(h,e){var g,f=arguments;function d(j){return j!==undefined}function i(j){return j!=null}this.each(function(){var k=b.slider(this,h);if(typeof h=="string"){switch(h){case"value":if(d(f[1])&&d(f[2])){var j=k.getPointers();if(i(j[0])&&i(f[1])){j[0].set(f[1]);j[0].setIndexOver()}if(i(j[1])&&i(f[2])){j[1].set(f[2]);j[1].setIndexOver()}}else{if(d(f[1])){var j=k.getPointers();if(i(j[0])&&i(f[1])){j[0].set(f[1]);j[0].setIndexOver()}}else{g=k.getValue()}}break;case"prc":if(d(f[1])&&d(f[2])){var j=k.getPointers();if(i(j[0])&&i(f[1])){j[0]._set(f[1]);j[0].setIndexOver()}if(i(j[1])&&i(f[2])){j[1]._set(f[2]);j[1].setIndexOver()}}else{if(d(f[1])){var j=k.getPointers();if(i(j[0])&&i(f[1])){j[0]._set(f[1]);j[0].setIndexOver()}}else{g=k.getPrcValue()}}break;case"calculatedValue":var m=k.getValue().split(";");g="";for(var l=0;l<m.length;l++){g+=(l>0?";":"")+k.nice(m[l])}break;case"skin":k.setSkin(f[1]);break}}else{if(!h&&!e){if(!jSliderIsArray(g)){g=[]}g.push(slider)}}});if(jSliderIsArray(g)&&g.length==1){g=g[0]}return g||this};var c={settings:{from:1,to:10,step:1,smooth:true,limits:true,round:0,value:"5;7",dimension:""},className:"jslider",selector:".jslider-",template:jSliderTmpl('<span class="<%=className%>"><table><tr><td><div class="<%=className%>-bg"><i class="l"><i></i></i><i class="r"><i></i></i><i class="v"><i></i></i></div><div class="<%=className%>-pointer"><i></i></div><div class="<%=className%>-pointer <%=className%>-pointer-to"><i></i></div><div class="<%=className%>-label"><span><%=settings.from%></span></div><div class="<%=className%>-label <%=className%>-label-to"><span><%=settings.to%></span><%=settings.dimension%></div><div class="<%=className%>-value"><span></span><%=settings.dimension%></div><div class="<%=className%>-value <%=className%>-value-to"><span></span><%=settings.dimension%></div><div class="<%=className%>-scale"><%=scale%></div></td></tr></table></span>')};this.jSlider=function(){return this.init.apply(this,arguments)};jSlider.prototype={init:function(e,d){this.settings=b.extend(true,{},c.settings,d?d:{});this.inputNode=b(e).hide();this.settings.interval=this.settings.to-this.settings.from;this.settings.value=this.inputNode.attr("value");if(this.settings.calculate&&b.isFunction(this.settings.calculate)){this.nice=this.settings.calculate}if(this.settings.onstatechange&&b.isFunction(this.settings.onstatechange)){this.onstatechange=this.settings.onstatechange}this.is={init:false};this.o={};this.create()},onstatechange:function(){},create:function(){var d=this;this.domNode=b(c.template({className:c.className,settings:{from:this.nice(this.settings.from),to:this.nice(this.settings.to),dimension:this.settings.dimension},scale:this.generateScale()}));this.inputNode.after(this.domNode);this.drawScale();if(this.settings.skin&&this.settings.skin.length>0){this.setSkin(this.settings.skin)}this.sizes={domWidth:this.domNode.width(),domOffset:this.domNode.offset()};b.extend(this.o,{pointers:{},labels:{0:{o:this.domNode.find(c.selector+"value").not(c.selector+"value-to")},1:{o:this.domNode.find(c.selector+"value").filter(c.selector+"value-to")}},limits:{0:this.domNode.find(c.selector+"label").not(c.selector+"label-to"),1:this.domNode.find(c.selector+"label").filter(c.selector+"label-to")}});b.extend(this.o.labels[0],{value:this.o.labels[0].o.find("span")});b.extend(this.o.labels[1],{value:this.o.labels[1].o.find("span")});if(!d.settings.value.split(";")[1]){this.settings.single=true;this.domNode.addDependClass("single")}if(!d.settings.limits){this.domNode.addDependClass("limitless")}this.domNode.find(c.selector+"pointer").each(function(e){var g=d.settings.value.split(";")[e];if(g){d.o.pointers[e]=new a(this,e,d);var f=d.settings.value.split(";")[e-1];if(f&&new Number(g)<new Number(f)){g=f}g=g<d.settings.from?d.settings.from:g;g=g>d.settings.to?d.settings.to:g;d.o.pointers[e].set(g,true)}});this.o.value=this.domNode.find(".v");this.is.init=true;b.each(this.o.pointers,function(e){d.redraw(this)});(function(e){b(window).resize(function(){e.onresize()})})(this)},setSkin:function(d){if(this.skin_){this.domNode.removeDependClass(this.skin_,"_")}this.domNode.addDependClass(this.skin_=d,"_")},setPointersIndex:function(d){b.each(this.getPointers(),function(e){this.index(e)})},getPointers:function(){return this.o.pointers},generateScale:function(){if(this.settings.scale&&this.settings.scale.length>0){var f="";var e=this.settings.scale;var g=Math.round((100/(e.length-1))*10)/10;for(var d=0;d<e.length;d++){f+='<span style="left: '+d*g+'%">'+(e[d]!="|"?"<ins>"+e[d]+"</ins>":"")+"</span>"}return f}else{return""}return""},drawScale:function(){this.domNode.find(c.selector+"scale span ins").each(function(){b(this).css({marginLeft:-b(this).outerWidth()/2})})},onresize:function(){var d=this;this.sizes={domWidth:this.domNode.width(),domOffset:this.domNode.offset()};b.each(this.o.pointers,function(e){d.redraw(this)})},limits:function(d,g){if(!this.settings.smooth){var f=this.settings.step*100/(this.settings.interval);d=Math.round(d/f)*f}var e=this.o.pointers[1-g.uid];if(e&&g.uid&&d<e.value.prc){d=e.value.prc}if(e&&!g.uid&&d>e.value.prc){d=e.value.prc}if(d<0){d=0}if(d>100){d=100}return Math.round(d*10)/10},redraw:function(d){if(!this.is.init){return false}this.setValue();if(this.o.pointers[0]&&this.o.pointers[1]){this.o.value.css({left:this.o.pointers[0].value.prc+"%",width:(this.o.pointers[1].value.prc-this.o.pointers[0].value.prc)+"%"})}this.o.labels[d.uid].value.html(this.nice(d.value.origin));this.redrawLabels(d)},redrawLabels:function(j){function f(l,m,n){m.margin=-m.label/2;label_left=m.border+m.margin;if(label_left<0){m.margin-=label_left}if(m.border+m.label/2>e.sizes.domWidth){m.margin=0;m.right=true}else{m.right=false}l.o.css({left:n+"%",marginLeft:m.margin,right:"auto"});if(m.right){l.o.css({left:"auto",right:0})}return m}var e=this;var g=this.o.labels[j.uid];var k=j.value.prc;var h={label:g.o.outerWidth(),right:false,border:(k*this.sizes.domWidth)/100};if(!this.settings.single){var d=this.o.pointers[1-j.uid];var i=this.o.labels[d.uid];switch(j.uid){case 0:if(h.border+h.label/2>i.o.offset().left-this.sizes.domOffset.left){i.o.css({visibility:"hidden"});i.value.html(this.nice(d.value.origin));g.o.css({visibility:"visible"});k=(d.value.prc-k)/2+k;if(d.value.prc!=j.value.prc){g.value.html(this.nice(j.value.origin)+"&nbsp;&ndash;&nbsp;"+this.nice(d.value.origin));h.label=g.o.outerWidth();h.border=(k*this.sizes.domWidth)/100}}else{i.o.css({visibility:"visible"})}break;case 1:if(h.border-h.label/2<i.o.offset().left-this.sizes.domOffset.left+i.o.outerWidth()){i.o.css({visibility:"hidden"});i.value.html(this.nice(d.value.origin));g.o.css({visibility:"visible"});k=(k-d.value.prc)/2+d.value.prc;if(d.value.prc!=j.value.prc){g.value.html(this.nice(d.value.origin)+"&nbsp;&ndash;&nbsp;"+this.nice(j.value.origin));h.label=g.o.outerWidth();h.border=(k*this.sizes.domWidth)/100}}else{i.o.css({visibility:"visible"})}break}}h=f(g,h,k);if(i){var h={label:i.o.outerWidth(),right:false,border:(d.value.prc*this.sizes.domWidth)/100};h=f(i,h,d.value.prc)}this.redrawLimits()},redrawLimits:function(){if(this.settings.limits){var f=[true,true];for(key in this.o.pointers){if(!this.settings.single||key==0){var j=this.o.pointers[key];var e=this.o.labels[j.uid];var h=e.o.offset().left-this.sizes.domOffset.left;var d=this.o.limits[0];if(h<d.outerWidth()){f[0]=false}var d=this.o.limits[1];if(h+e.o.outerWidth()>this.sizes.domWidth-d.outerWidth()){f[1]=false}}}for(var g=0;g<f.length;g++){if(f[g]){this.o.limits[g].fadeIn("fast")}else{this.o.limits[g].fadeOut("fast")}}}},setValue:function(){var d=this.getValue();this.inputNode.attr("value",d);this.onstatechange.call(this,d)},getValue:function(){if(!this.is.init){return false}var e=this;var d="";b.each(this.o.pointers,function(f){if(this.value.prc!=undefined&&!isNaN(this.value.prc)){d+=(f>0?";":"")+e.prcToValue(this.value.prc)}});return d},getPrcValue:function(){if(!this.is.init){return false}var e=this;var d="";b.each(this.o.pointers,function(f){if(this.value.prc!=undefined&&!isNaN(this.value.prc)){d+=(f>0?";":"")+this.value.prc}});return d},prcToValue:function(l){if(this.settings.heterogeneity&&this.settings.heterogeneity.length>0){var g=this.settings.heterogeneity;var f=0;var k=this.settings.from;for(var e=0;e<=g.length;e++){if(g[e]){var d=g[e].split("/")}else{var d=[100,this.settings.to]}d[0]=new Number(d[0]);d[1]=new Number(d[1]);if(l>=f&&l<=d[0]){var j=k+((l-f)*(d[1]-k))/(d[0]-f)}f=d[0];k=d[1]}}else{var j=this.settings.from+(l*this.settings.interval)/100}return this.round(j)},valueToPrc:function(j,l){if(this.settings.heterogeneity&&this.settings.heterogeneity.length>0){var g=this.settings.heterogeneity;var f=0;var k=this.settings.from;for(var e=0;e<=g.length;e++){if(g[e]){var d=g[e].split("/")}else{var d=[100,this.settings.to]}d[0]=new Number(d[0]);d[1]=new Number(d[1]);if(j>=k&&j<=d[1]){var m=l.limits(f+(j-k)*(d[0]-f)/(d[1]-k))}f=d[0];k=d[1]}}else{var m=l.limits((j-this.settings.from)*100/this.settings.interval)}return m},round:function(d){d=Math.round(d/this.settings.step)*this.settings.step;if(this.settings.round){d=Math.round(d*Math.pow(10,this.settings.round))/Math.pow(10,this.settings.round)}else{d=Math.round(d)}return d},nice:function(d){d=d.toString().replace(/,/gi,".");d=d.toString().replace(/ /gi,"");if(Number.prototype.jSliderNice){return(new Number(d)).jSliderNice(this.settings.round).replace(/-/gi,"&minus;")}else{return new Number(d)}}};function a(){this.baseConstructor.apply(this,arguments)}a.inheritFrom(Draggable,{oninit:function(f,e,d){this.uid=e;this.parent=d;this.value={};this.settings=this.parent.settings},onmousedown:function(d){this._parent={offset:this.parent.domNode.offset(),width:this.parent.domNode.width()};this.ptr.addDependClass("hover");this.setIndexOver()},onmousemove:function(e,d){var f=this._getPageCoords(e);this._set(this.calc(f.x))},onmouseup:function(d){if(this.parent.settings.callback&&b.isFunction(this.parent.settings.callback)){this.parent.settings.callback.call(this.parent,this.parent.getValue())}this.ptr.removeDependClass("hover")},setIndexOver:function(){this.parent.setPointersIndex(1);this.index(2)},index:function(d){this.ptr.css({zIndex:d})},limits:function(d){return this.parent.limits(d,this)},calc:function(e){var d=this.limits(((e-this._parent.offset.left)*100)/this._parent.width);return d},set:function(d,e){this.value.origin=this.parent.round(d);this._set(this.parent.valueToPrc(d,this),e)},_set:function(e,d){if(!d){this.value.origin=this.parent.prcToValue(e)}this.value.prc=e;this.ptr.css({left:e+"%"});this.parent.redraw(this)}})})(jQuery);
