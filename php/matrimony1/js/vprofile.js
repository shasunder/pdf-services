function y2k(number)    { return (number < 1000) ? number + 1900 : number; }

function makeArray() {
    this[0] = makeArray.arguments.length;
    for (i = 0; i<makeArray.arguments.length; i++)
        this[i+1] = makeArray.arguments[i];
}

var daysofweek = new makeArray('Sunday',
                               'Monday',
                               'Tuesday',
                               'Wednesday',
                               'Thursday',
                               'Friday',
                               'Saturday');

var monthsofyear  = new makeArray('January',
                                  'February',
                                  'March',
                                  'April',
                                  'May',
                                  'June',
                                  'July',
                                  'August',
                                  'September',
                                  'October',
                                  'November',
                                  'December');

var horroscopes   = new makeArray( 20, 19, 21, 20, 21, 22, 23, 23, 23, 23, 22, 22);

var starsigns     = new makeArray('Capricorn',
                                  'Aquarius',
                                  'Pisces',
                                  'Aries',
                                  'Taurus',
                                  'Gemini',
                                  'Cancer',
                                  'Leo',
                                  'Virgo',
                                  'Libra',
                                  'Scorpio',
                                  'Sagittarius');

var starsymbols   = new makeArray('Goat',
                                  'Water Bearer',
                                  'Fishes',
                                  'Ram',
                                  'Bull',
                                  'Twins',
                                  'Crab',
                                  'Lion',
                                  'Virgin',
                                  'Balance',
                                  'Scorpion',
                                  'Archer');

var birthstones   = new makeArray('Garnet',
                                  'Amethyst',
                                  'Aquamarine, bloodstone',
                                  'Diamond',
                                  'Emerald',
                                  'Pearl, alexandrite, moonstone',
                                  'Ruby',
                                  'Peridot, sardonyx',
                                  'Sapphire',
                                  'Opal, tourmaline',
                                  'Topaz',
                                  'Turquoise, zircon');

var qualities     = new makeArray('Constancy',
                                  'Sincerity',
                                  'Courage',
                                  'Innocence',
                                  'Love, success',
                                  'Health, longevity',
                                  'Contentment',
                                  'Married happiness',
                                  'Clear thinking',
                                  'Hope',
                                  'Fidelity',
                                  'Prosperity');

function DayOfWeek(day,month,year) {
    var a = Math.floor((14 - month)/12);
    var y = year - a;
    var m = month + 12*a - 2;
    var d = (day + y + Math.floor(y/4) - Math.floor(y/100) + Math.floor(y/400) + Math.floor((31*m)/12)) % 7;
    return d+1;
}

function Nths(day) { 
    if (day == 1 || day == 21 || day == 31) return 'st';
    if (day == 2 || day == 22) return 'nd';
    if (day == 3 || day == 23) return 'rd';
    return 'th';
}

function FullDate(day,month,year) {
    return daysofweek[DayOfWeek(day,month,year)] +' '+ day + Nths(day) +' '+ monthsofyear[month] +' '+ year;
}

function StarSign(day,month) {
    if (day < horroscopes[month])
        return month;
    else if (month == 12)
        return 1;
    else
        return month + 1;
}

function StarDate(day,month,year) {
    var beginYear = year;
    var endYear = year;
    var beginMonth = month;
    var endMonth = month;

    if (day < horroscopes[month])
        beginMonth--;
    else 
        endMonth++;
     
    if (beginMonth == 0) {
        beginMonth = 12;
        beginYear--;
    }
    else if (endMonth == 13) {
        endMonth = 1;
        endYear++;
    }

    beginDay = horroscopes[beginMonth];
    endDay = horroscopes[endMonth] - 1;

    return FullDate(beginDay,beginMonth,beginYear) +
           ' - ' +
           FullDate(endDay,endMonth,endYear);
}

if (location.search.length == 0) {
    var year = parent.year - 0;
    var month = parent.month - 0;
    var day = parent.day - 0;
}
else {
    var day   = location.search.substring(5,7) - 0;
    var month = location.search.substring(14,16) - 0;
    var year  = location.search.substring(22) - 0;
}

var today = new Date();
var thisYear = y2k(today.getYear());
var thisMonth = today.getMonth()+1;
var thisDay = today.getDate();


function popImg(iName) {
		var pURL=iName;
		pInfo='toolbar=0,';
		pInfo+='location=0,';
		pInfo+='directories=0,';	
		pInfo+='status=0,';
		pInfo+='menubar=0,';
		pInfo+='scrollbars=0,';
		pInfo+='resizable=0';
	window.open(pURL, 'Image', pInfo);
}