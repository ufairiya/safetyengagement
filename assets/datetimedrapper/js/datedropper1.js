! function(e) {
    var a = {
            t: "transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd",
            a: "webkitAnimationEnd mozAnimationEnd oAnimationEnd oanimationend animationend"
        },
        t = {
            en: {
                name: "English",
                gregorian: !1,
                months: {
                    short: ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec"],
                    full: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]
                },
                weekdays: {
                    short: ["S", "M", "T", "W", "T", "F", "S"],
                    full: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]
                }
            },
            ka: {
                name: "Georgian",
                gregorian: !1,
                months: {
                    short: ["იან", "თებ", "მარტ", "აპრ", "მაი", "ივნ", "ივლ", "აგვ", "სექტ", "ოქტ", "ნოემბ", "დეკ"],
                    full: ["იანვარი", "თებერვალი", "მარტი", "აპრილი", "მაისი", "ივნისი", "ივლისი", "აგვისტო", "სექტემბერი", "ოქტომბერი", "ნოემბერი", "დეკემბერი"]
                },
                weekdays: {
                    short: ["კვ", "ორ", "სამ", "ოთხ", "ხუთ", "პარ", "შაბ"],
                    full: ["კვირა", "ორშაბათი", "სამშაბათი", "ოთხშაბათი", "ხუთშაბათი", "პარასკევი", "შაბათი"]
                }
            },
            it: {
                name: "Italiano",
                gregorian: !0,
                months: {
                    short: ["Gen", "Feb", "Mar", "Apr", "Mag", "Giu", "Lug", "Ago", "Set", "Ott", "Nov", "Dic"],
                    full: ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"]
                },
                weekdays: {
                    short: ["D", "L", "M", "M", "G", "V", "S"],
                    full: ["Domenica", "Lunedì", "Martedì", "Mercoledì", "Giovedì", "Venerdì", "Sabato"]
                }
            },
            fr: {
                name: "Français",
                gregorian: !0,
                months: {
                    short: ["Jan", "Fév", "Mar", "Avr", "Mai", "Jui", "Jui", "Aoû", "Sep", "Oct", "Nov", "Déc"],
                    full: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"]
                },
                weekdays: {
                    short: ["D", "L", "M", "M", "J", "V", "S"],
                    full: ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"]
                }
            },
            zh: {
                name: "中文",
                gregorian: !0,
                months: {
                    short: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
                    full: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"]
                },
                weekdays: {
                    short: ["天", "一", "二", "三", "四", "五", "六"],
                    full: ["星期天", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"]
                }
            },
            ar: {
                name: "العَرَبِيَّة",
                gregorian: !1,
                months: {
                    short: ["جانفي", "فيفري", "مارس", "أفريل", "ماي", "جوان", "جويلية", "أوت", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"],
                    full: ["جانفي", "فيفري", "مارس", "أفريل", "ماي", "جوان", "جويلية", "أوت", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"]
                },
                weekdays: {
                    short: ["S", "M", "T", "W", "T", "F", "S"],
                    full: ["الأحد", "الإثنين", "الثلثاء", "الأربعاء", "الخميس", "الجمعة", "السبت"]
                }
            },
            fa: {
                name: "فارسی",
                gregorian: !1,
                months: {
                    short: ["ژانویه", "فووریه", "مارچ", "آپریل", "می", "جون", "جولای", "آگوست", "سپتامبر", "اکتبر", "نوامبر", "دسامبر"],
                    full: ["ژانویه", "فووریه", "مارچ", "آپریل", "می", "جون", "جولای", "آگوست", "سپتامبر", "اکتبر", "نوامبر", "دسامبر"]
                },
                weekdays: {
                    short: ["S", "M", "T", "W", "T", "F", "S"],
                    full: ["یکشنبه", "دوشنبه", "سه شنبه", "چهارشنبه", "پنج شنبه", "جمعه", "شنبه"]
                }
            },
            hu: {
                name: "Hungarian",
                gregorian: !0,
                months: {
                    short: ["jan", "feb", "már", "ápr", "máj", "jún", "júl", "aug", "sze", "okt", "nov", "dec"],
                    full: ["január", "február", "március", "április", "május", "június", "július", "augusztus", "szeptember", "október", "november", "december"]
                },
                weekdays: {
                    short: ["v", "h", "k", "s", "c", "p", "s"],
                    full: ["vasárnap", "hétfő", "kedd", "szerda", "csütörtök", "péntek", "szombat"]
                }
            },
            gr: {
                name: "Ελληνικά",
                gregorian: !0,
                months: {
                    short: ["Ιαν", "Φεβ", "Μάρ", "Απρ", "Μάι", "Ιούν", "Ιούλ", "Αύγ", "Σεπ", "Οκτ", "Νοέ", "Δεκ"],
                    full: ["Ιανουάριος", "Φεβρουάριος", "Μάρτιος", "Απρίλιος", "Μάιος", "Ιούνιος", "Ιούλιος", "Αύγουστος", "Σεπτέμβριος", "Οκτώβριος", "Νοέμβριος", "Δεκέμβριος"]
                },
                weekdays: {
                    short: ["Κ", "Δ", "Τ", "Τ", "Π", "Π", "Σ"],
                    full: ["Κυριακή", "Δευτέρα", "Τρίτη", "Τετάρτη", "Πέμπτη", "Παρασκευή", "Σάββατο"]
                }
            },
            es: {
                name: "Español",
                gregorian: !0,
                months: {
                    short: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                    full: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"]
                },
                weekdays: {
                    short: ["D", "L", "M", "X", "J", "V", "S"],
                    full: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"]
                }
            },
            da: {
                name: "Dansk",
                gregorian: !0,
                months: {
                    short: ["jan", "feb", "mar", "apr", "maj", "jun", "jul", "aug", "sep", "okt", "nov", "dec"],
                    full: ["januar", "februar", "marts", "april", "maj", "juni", "juli", "august", "september", "oktober", "november", "december"]
                },
                weekdays: {
                    short: ["s", "m", "t", "o", "t", "f", "l"],
                    full: ["søndag", "mandag", "tirsdag", "onsdag", "torsdag", "fredag", "lørdag"]
                }
            },
            de: {
                name: "Deutsch",
                gregorian: !0,
                months: {
                    short: ["Jan", "Feb", "Mär", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dez"],
                    full: ["Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember"]
                },
                weekdays: {
                    short: ["S", "M", "D", "M", "D", "F", "S"],
                    full: ["Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag"]
                }
            },
            nl: {
                name: "Nederlands",
                gregorian: !0,
                months: {
                    short: ["jan", "feb", "maa", "apr", "mei", "jun", "jul", "aug", "sep", "okt", "nov", "dec"],
                    full: ["januari", "februari", "maart", "april", "mei", "juni", "juli", "augustus", "september", "oktober", "november", "december"]
                },
                weekdays: {
                    short: ["z", "m", "d", "w", "d", "v", "z"],
                    full: ["zondag", "maandag", "dinsdag", "woensdag", "donderdag", "vrijdag", "zaterdag"]
                }
            },
            pl: {
                name: "język polski",
                gregorian: !0,
                months: {
                    short: ["sty", "lut", "mar", "kwi", "maj", "cze", "lip", "sie", "wrz", "paź", "lis", "gru"],
                    full: ["styczeń", "luty", "marzec", "kwiecień", "maj", "czerwiec", "lipiec", "sierpień", "wrzesień", "październik", "listopad", "grudzień"]
                },
                weekdays: {
                    short: ["n", "p", "w", "ś", "c", "p", "s"],
                    full: ["niedziela", "poniedziałek", "wtorek", "środa", "czwartek", "piątek", "sobota"]
                }
            },
            pt: {
                name: "Português",
                gregorian: !0,
                months: {
                    short: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
                    full: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"]
                },
                weekdays: {
                    short: ["D", "S", "T", "Q", "Q", "S", "S"],
                    full: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"]
                }
            },
            si: {
                name: "Slovenščina",
                gregorian: !0,
                months: {
                    short: ["jan", "feb", "mar", "apr", "maj", "jun", "jul", "avg", "sep", "okt", "nov", "dec"],
                    full: ["januar", "februar", "marec", "april", "maj", "junij", "julij", "avgust", "september", "oktober", "november", "december"]
                },
                weekdays: {
                    short: ["n", "p", "t", "s", "č", "p", "s"],
                    full: ["nedelja", "ponedeljek", "torek", "sreda", "četrtek", "petek", "sobota"]
                }
            },
            uk: {
                name: "українська мова",
                gregorian: !0,
                months: {
                    short: ["січень", "лютий", "березень", "квітень", "травень", "червень", "липень", "серпень", "вересень", "жовтень", "листопад", "грудень"],
                    full: ["січень", "лютий", "березень", "квітень", "травень", "червень", "липень", "серпень", "вересень", "жовтень", "листопад", "грудень"]
                },
                weekdays: {
                    short: ["н", "п", "в", "с", "ч", "п", "с"],
                    full: ["неділя", "понеділок", "вівторок", "середа", "четвер", "п'ятниця", "субота"]
                }
            },
            ru: {
                name: "русский язык",
                gregorian: !0,
                months: {
                    short: ["январь", "февраль", "март", "апрель", "май", "июнь", "июль", "август", "сентябрь", "октябрь", "ноябрь", "декабрь"],
                    full: ["январь", "февраль", "март", "апрель", "май", "июнь", "июль", "август", "сентябрь", "октябрь", "ноябрь", "декабрь"]
                },
                weekdays: {
                    short: ["в", "п", "в", "с", "ч", "п", "с"],
                    full: ["воскресенье", "понедельник", "вторник", "среда", "четверг", "пятница", "суббота"]
                }
            },
            tr: {
                name: "Türkçe",
                gregorian: !0,
                months: {
                    short: ["Oca", "Şub", "Mar", "Nis", "May", "Haz", "Tem", "Ağu", "Eyl", "Eki", "Kas", "Ara"],
                    full: ["Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık"]
                },
                weekdays: {
                    short: ["P", "P", "S", "Ç", "P", "C", "C"],
                    full: ["Pazar", "Pazartesi", "Sali", "Çarşamba", "Perşembe", "Cuma", "Cumartesi"]
                }
            },
            ko: {
                name: "조선말",
                gregorian: !0,
                months: {
                    short: ["1월", "2월", "3월", "4월", "5월", "6월", "7월", "8월", "9월", "10월", "11월", "12월"],
                    full: ["1월", "2월", "3월", "4월", "5월", "6월", "7월", "8월", "9월", "10월", "11월", "12월"]
                },
                weekdays: {
                    short: ["일", "월", "화", "수", "목", "금", "토"],
                    full: ["일요일", "월요일", "화요일", "수요일", "목요일", "금요일", "토요일"]
                }
            },
            fi: {
                name: "suomen kieli",
                gregorian: !0,
                months: {
                    short: ["Tam", "Hel", "Maa", "Huh", "Tou", "Kes", "Hei", "Elo", "Syy", "Lok", "Mar", "Jou"],
                    full: ["Tammikuu", "Helmikuu", "Maaliskuu", "Huhtikuu", "Toukokuu", "Kesäkuu", "Heinäkuu", "Elokuu", "Syyskuu", "Lokakuu", "Marraskuu", "Joulukuu"]
                },
                weekdays: {
                    short: ["S", "M", "T", "K", "T", "P", "L"],
                    full: ["Sunnuntai", "Maanantai", "Tiistai", "Keskiviikko", "Torstai", "Perjantai", "Lauantai"]
                }
            },
            vi: {
                name: "Tiếng việt",
                gregorian: !1,
                months: {
                    short: ["Th.01", "Th.02", "Th.03", "Th.04", "Th.05", "Th.06", "Th.07", "Th.08", "Th.09", "Th.10", "Th.11", "Th.12"],
                    full: ["Tháng 01", "Tháng 02", "Tháng 03", "Tháng 04", "Tháng 05", "Tháng 06", "Tháng 07", "Tháng 08", "Tháng 09", "Tháng 10", "Tháng 11", "Tháng 12"]
                },
                weekdays: {
                    short: ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
                    full: ["Chủ nhật", "Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy"]
                }
            }
        },
        n = {},
        r = null,
        l = !1,
        s = null,
        d = null,
        u = null,
        c = !1,
        k = function() {
            return !!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)
        },
        p = function() {
            r && n[r.id].fx && !n[r.id].fxmobile && (e(window).width() < 480 ? r.element.removeClass("picker-fxs") : r.element.addClass("picker-fxs"))
        },
        m = function() {
            return !(n[r.id].jump >= n[r.id].key.y.max - n[r.id].key.y.min)
        },
        g = function() {
            var e = A(w()),
                a = A(v());
            if (n[r.id].lock) {
                if ("from" == n[r.id].lock) return e < a ? (Q(), r.element.addClass("picker-lkd"), !0) : (r.element.removeClass("picker-lkd"), !1);
                if ("to" == n[r.id].lock) return e > a ? (Q(), r.element.addClass("picker-lkd"), !0) : (r.element.removeClass("picker-lkd"), !1)
            }
            if (n[r.id].disabledays) return -1 != n[r.id].disabledays.indexOf(e) ? (Q(), r.element.addClass("picker-lkd"), !0) : (r.element.removeClass("picker-lkd"), !1)
        },
        h = function(e) {
            return e % 1 == 0
        },
        f = function(e) {
            return /(^\d{1,4}[\.|\\/|-]\d{1,2}[\.|\\/|-]\d{1,4})(\s*(?:0?[1-9]:[0-5]|1(?=[012])\d:[0-5])\d\s*[ap]m)?$/.test(e)
        },
        y = function(e) {
            return parseInt(n[r.id].key[e].current)
        },
        b = function(e) {
            return parseInt(n[r.id].key[e].today)
        },
        v = function() {
            return b("m") + "/" + b("d") + "/" + b("y")
        },
        w = function() {
            return y("m") + "/" + y("d") + "/" + y("y")
        },
        T = function(e, a) {
            for (var i = [], t = n[r.id].key[e], l = t.min; l <= t.max; l++) l % a == 0 && i.push(l);
            return i
        },
        M = function(e, a) {
            for (var i = a[0], t = Math.abs(e - i), n = 0; n < a.length; n++) {
                var r = Math.abs(e - a[n]);
                r < t && (t = r, i = a[n])
            }
            return i
        },
        C = function(e, a) {
            var i = n[r.id].key[e];
            return a > i.max ? C(e, a - i.max + (i.min - 1)) : a < i.min ? C(e, a + 1 + (i.max - i.min)) : a
        },
        j = function() {
            return t[n[r.id].lang].gregorian ? [1, 2, 3, 4, 5, 6, 0] : [0, 1, 2, 3, 4, 5, 6]
        },
        D = function(e) {
            return z('ul.pick[data-k="' + e + '"]')
        },
        S = function(a, i) {
            ul = D(a);
            var t = [];
            return ul.find("li").each(function() {
                t.push(e(this).attr("value"))
            }), "last" == i ? t[t.length - 1] : t[0]
        },
        z = function(e) {
            if (r) return r.element.find(e)
        },
        A = function(e) {
            return Date.parse(e) / 1e3
        },
        x = function() {
            n[r.id].large && (r.element.toggleClass("picker-lg"), Y())
        },
        J = function() {
            z("ul.pick.pick-l").toggleClass("visible")
        },
        F = function() {
            if (!r.element.hasClass("picker-modal")) {
                var e = r.input,
                    a = e.offset().left + e.outerWidth() / 2,
                    i = e.offset().top + e.outerHeight();
                r.element.css({
                    left: a,
                    top: i
                })
            }
        },
        O = function(e) {
            n[r.id].lang = Object.keys(t)[e], E(), G()
        },
        E = function() {
            var a = j();
            z(".pick-lg .pick-lg-h li").each(function(i) {
                e(this).html(t[n[r.id].lang].weekdays.short[a[i]])
            }), z("ul.pick.pick-m li").each(function() {
                e(this).html(t[n[r.id].lang].months.short[e(this).attr("value") - 1])
            })
        },
        N = function() {
            r.element.addClass("picker-focus")
        },
        L = function() {
            g() || (r.element.removeClass("picker-focus"), r.element.hasClass("picker-modal") && e(".picker-modal-overlay").addClass("tohide"), r = null), l = !1
        },
        P = function(a) {
            var l = D(a),
                o = n[r.id].key[a];
            for (n[r.id].key[a].current = o.today < o.min && o.min || o.today, i = o.min; i <= o.max; i++) {
                var s = i;
                "m" == a && (s = t[n[r.id].lang].months.short[i - 1]), "l" == a && (s = t[Object.keys(t)[i]].name), s += "d" == a ? "<span></span>" : "", e("<li>", {
                    value: i,
                    html: s
                }).appendTo(l)
            }
            e("<div>", {
                class: "pick-arw pick-arw-s1 pick-arw-l",
                html: e("<i>", {
                    class: "pick-i-l"
                })
            }).appendTo(l), e("<div>", {
                class: "pick-arw pick-arw-s1 pick-arw-r",
                html: e("<i>", {
                    class: "pick-i-r"
                })
            }).appendTo(l), "y" == a && (e("<div>", {
                class: "pick-arw pick-arw-s2 pick-arw-l",
                html: e("<i>", {
                    class: "pick-i-l"
                })
            }).appendTo(l), e("<div>", {
                class: "pick-arw pick-arw-s2 pick-arw-r",
                html: e("<i>", {
                    class: "pick-i-r"
                })
            }).appendTo(l)), K(a, y(a))
        },
        Y = function() {
            var a = 0,
                i = z(".pick-lg-b");
            i.find("li").empty().removeClass("pick-n pick-b pick-a pick-v pick-lk pick-sl pick-h").attr("data-value", "");
            new Date(w());
            var l = new Date(w()),
                o = new Date(w()),
                s = function(e) {
                    var a = e.getMonth(),
                        i = e.getFullYear();
                    return [31, i % 4 == 0 && (i % 100 != 0 || i % 400 == 0) ? 29 : 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][a]
                };
            o.setMonth(o.getMonth() - 1), l.setDate(1);
            var d = l.getDay() - 1;
            d < 0 && (d = 6), t[n[r.id].lang].gregorian && --d < 0 && (d = 6);
            for (c = s(o) - d; c <= s(o); c++) i.find("li").eq(a).html(c).addClass("pick-b pick-n pick-h"), a++;
            for (c = 1; c <= s(l); c++) i.find("li").eq(a).html(c).addClass("pick-n pick-v").attr("data-value", c), a++;
            if (i.find("li.pick-n").length < 42)
                for (var u = 42 - i.find("li.pick-n").length, c = 1; c <= u; c++) i.find("li").eq(a).html(c).addClass("pick-a pick-n pick-h"), a++;
            n[r.id].lock && ("from" === n[r.id].lock ? y("y") <= b("y") && (y("m") == b("m") ? z('.pick-lg .pick-lg-b li.pick-v[data-value="' + b("d") + '"]').prevAll("li").addClass("pick-lk") : y("m") < b("m") ? z(".pick-lg .pick-lg-b li").addClass("pick-lk") : y("m") > b("m") && y("y") < b("y") && z(".pick-lg .pick-lg-b li").addClass("pick-lk")) : y("y") >= b("y") && (y("m") == b("m") ? z('.pick-lg .pick-lg-b li.pick-v[data-value="' + b("d") + '"]').nextAll("li").addClass("pick-lk") : y("m") > b("m") ? z(".pick-lg .pick-lg-b li").addClass("pick-lk") : y("m") < b("m") && y("y") > b("y") && z(".pick-lg .pick-lg-b li").addClass("pick-lk"))), n[r.id].disabledays && e.each(n[r.id].disabledays, function(e, a) {
                if (a && f(a)) {
                    var i = new Date(1e3 * a);
                    i.getMonth() + 1 == y("m") && i.getFullYear() == y("y") && z('.pick-lg .pick-lg-b li.pick-v[data-value="' + i.getDate() + '"]').addClass("pick-lk")
                }
            }), z(".pick-lg-b li.pick-v[data-value=" + y("d") + "]").addClass("pick-sl")
        },
        H = function() {
            var a = y("m"),
                i = y("y"),
                l = i % 4 == 0 && (i % 100 != 0 || i % 400 == 0);
            n[r.id].key.d.max = [31, l ? 29 : 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][a - 1], y("d") > n[r.id].key.d.max && (n[r.id].key.d.current = n[r.id].key.d.max, K("d", y("d"))), z(".pick-d li").removeClass("pick-wke").each(function() {
                var l = new Date(a + "/" + e(this).attr("value") + "/" + i).getDay();
                e(this).find("span").html(t[n[r.id].lang].weekdays.full[l]), 0 != l && 6 != l || e(this).addClass("pick-wke")
            }), r.element.hasClass("picker-lg") && (z(".pick-lg-b li").removeClass("pick-wke"), z(".pick-lg-b li.pick-v").each(function() {
                var t = new Date(a + "/" + e(this).attr("data-value") + "/" + i).getDay();
                0 != t && 6 != t || e(this).addClass("pick-wke")
            }))
        },
        G = function() {
            r.element.hasClass("picker-lg") && Y(), H(), q()
        },
        K = function(e, a) {
            var i = D(e);
            if (i.find("li").removeClass("pick-sl pick-bfr pick-afr"), a == S(e, "last") && ((t = i.find('li[value="' + S(e, "first") + '"]')).clone().insertAfter(i.find("li[value=" + a + "]")), t.remove()), a == S(e, "first")) {
                var t = i.find('li[value="' + S(e, "last") + '"]');
                t.clone().insertBefore(i.find("li[value=" + a + "]")), t.remove()
            }
            i.find("li[value=" + a + "]").addClass("pick-sl"), i.find("li.pick-sl").nextAll("li").addClass("pick-afr"), i.find("li.pick-sl").prevAll("li").addClass("pick-bfr")
        },
        V = function(e, a) {
            var i = n[r.id].key[e];
            a > i.max && ("d" == e && I("m", "right"), "m" == e && I("y", "right"), a = i.min), a < i.min && ("d" == e && I("m", "left"), "m" == e && I("y", "left"), a = i.max), n[r.id].key[e].current = a, K(e, a)
        },
        I = function(e, a) {
            var i = y(e);
            "right" == a ? i++ : i--, V(e, i)
        },
        Q = function() {
            r.element.addClass("picker-rmbl")
        },
        W = function(e) {
            return e < 10 ? "0" + e : e
        },
        B = function(e) {
            var a = ["th", "st", "nd", "rd"],
                i = e % 100;
            return e + (a[(i - 20) % 10] || a[i] || a[0])
        },
        q = function() {
            if (!g() && l) {
                var e = y("d"),
                    a = y("m"),
                    i = y("y"),
                    o = new Date(a + "/" + e + "/" + i).getDay(),
                    s = n[r.id].format.replace(/\b(d)\b/g, W(e)).replace(/\b(m)\b/g, W(a)).replace(/\b(S)\b/g, B(e)).replace(/\b(Y)\b/g, i).replace(/\b(U)\b/g, A(w())).replace(/\b(D)\b/g, t[n[r.id].lang].weekdays.short[o]).replace(/\b(l)\b/g, t[n[r.id].lang].weekdays.full[o]).replace(/\b(F)\b/g, t[n[r.id].lang].months.full[a - 1]).replace(/\b(M)\b/g, t[n[r.id].lang].months.short[a - 1]).replace(/\b(n)\b/g, a).replace(/\b(j)\b/g, e);
                r.input.val(s).change(), l = !1
            }
        };
    if (k()) U = {
        i: "touchstart",
        m: "touchmove",
        e: "touchend"
    };
    else var U = {
        i: "mousedown",
        m: "mousemove",
        e: "mouseup"
    };
    var X = "div.datedropper.picker-focus";
    e(document).on("click", function(e) {
        r && (r.input.is(e.target) || r.element.is(e.target) || 0 !== r.element.has(e.target).length || (L(), s = null))
    }).on(a.a, X + ".picker-rmbl", function() {
        r.element.hasClass("picker-rmbl") && e(this).removeClass("picker-rmbl")
    }).on(a.t, ".picker-modal-overlay", function() {
        e(this).remove()
    }).on(U.i, X + " .pick-lg li.pick-v", function() {
        z(".pick-lg-b li").removeClass("pick-sl"), e(this).addClass("pick-sl"), n[r.id].key.d.current = e(this).attr("data-value"), K("d", e(this).attr("data-value")), l = !0
    }).on("click", X + " .pick-btn-sz", function() {
        x()
    }).on("click", X + " .pick-btn-lng", function() {
        J()
    }).on(U.i, X + " .pick-arw.pick-arw-s2", function(a) {
        a.preventDefault(), s = null;
        e(this).closest("ul").data("k");
        var i, t = n[r.id].jump;
        i = e(this).hasClass("pick-arw-r") ? y("y") + t : y("y") - t;
        var o = T("y", t);
        i > o[o.length - 1] && (i = o[0]), i < o[0] && (i = o[o.length - 1]), n[r.id].key.y.current = i, K("y", y("y")), l = !0
    }).on(U.i, X + " .pick-arw.pick-arw-s1", function(a) {
        a.preventDefault(), s = null;
        var i = e(this).closest("ul").data("k");
        e(this).hasClass("pick-arw-r") ? I(i, "right") : I(i, "left"), l = !0
    }).on(U.i, X + " ul.pick.pick-y li", function() {
        c = !0
    }).on(U.e, X + " ul.pick.pick-y li", function() {
        if (c && m()) {
            e(this).closest("ul").toggleClass("pick-jump");
            var a = M(y("y"), T("y", n[r.id].jump));
            n[r.id].key.y.current = a, K("y", y("y")), c = !1
        }
    }).on(U.i, X + " ul.pick.pick-d li", function() {
        c = !0
    }).on(U.e, X + " ul.pick.pick-d li", function() {
        c && (x(), c = !1)
    }).on(U.i, X + " ul.pick.pick-l li", function() {
        c = !0
    }).on(U.e, X + " ul.pick.pick-l li", function() {
        c && (J(), O(e(this).val()), c = !1)
    }).on(U.i, X + " ul.pick", function(a) {
        if (s = e(this)) {
            var i = s.data("k");
            d = k() ? a.originalEvent.touches[0].pageY : a.pageY, u = y(i)
        }
    }).on(U.m, function(e) {
        if (c = !1, s) {
            e.preventDefault();
            var a = s.data("k");
            o = k() ? e.originalEvent.touches[0].pageY : e.pageY, o = d - o, o = Math.round(.026 * o), i = u + o;
            var t = C(a, i);
            t != n[r.id].key[a].current && V(a, t), l = !0
        }
    }).on(U.e, function(e) {
        s && (s = null, d = null, u = null), r && G()
    }).on(U.i, X + " .pick-submit", function() {
        L()
    }), e(window).resize(function() {
        r && (F(), p())
    }), e.fn.dateDropper = function(a) {
        return e(this).each(function() {
            if (e(this).is("input") && !e(this).hasClass("picker-input")) {
                var a = e(this),
                    i = "datedropper-" + Object.keys(n).length;
                a.attr("data-id", i).addClass("picker-input").prop({
                    type: "text",
                    readonly: !0
                });
                var o = a.data("default-date") && f(a.data("default-date")) ? a.data("default-date") : null,
                    s = a.data("disabled-days") ? a.data("disabled-days").split(",") : null,
                    d = a.data("format") || "m/d/Y",
                    u = !1 !== a.data("fx") || a.data("fx"),
                    c = !1 === a.data("fx") ? "" : "picker-fxs",
                    k = !1 !== a.data("fx-mobile") || a.data("fx-mobile"),
                    p = !1 !== a.data("init-set"),
                    m = a.data("lang") && a.data("lang") in t ? a.data("lang") : "en",
                    g = !0 === a.data("large-mode"),
                    y = !0 === a.data("large-default") && !0 === g ? "picker-lg" : "",
                    b = ("from" == a.data("lock") || "to" == a.data("lock")) && a.data("lock"),
                    v = a.data("jump") && h(a.data("jump")) ? a.data("jump") : 10,
                    w = a.data("max-year") && h(a.data("max-year")) ? a.data("max-year") : (new Date).getFullYear(),
                    T = a.data("min-year") && h(a.data("min-year")) ? a.data("min-year") : 1970,
                    M = !0 === a.data("modal") ? "picker-modal" : "",
                    C = a.data("theme") || "primary",
                    D = !0 === a.data("translate-mode");
                if (s && e.each(s, function(e, a) {
                        a && f(a) && (s[e] = A(a))
                    }), n[i] = {
                        disabledays: s,
                        format: d,
                        fx: u,
                        fxmobile: k,
                        lang: m,
                        large: g,
                        lock: b,
                        jump: v,
                        key: {
                            m: {
                                min: 1,
                                max: 12,
                                current: 1,
                                today: (new Date).getMonth() + 1
                            },
                            d: {
                                min: 1,
                                max: 31,
                                current: 1,
                                today: (new Date).getDate()
                            },
                            y: {
                                min: T,
                                max: w,
                                current: T,
                                today: (new Date).getFullYear()
                            },
                            l: {
                                min: 0,
                                max: Object.keys(t).length - 1,
                                current: 0,
                                today: 0
                            }
                        },
                        translate: D
                    }, o) {
                    var S = /\d+/g,
                        x = o.match(S);
                    e.each(x, function(e, a) {
                        x[e] = parseInt(a)
                    }), n[i].key.m.today = x[0] && x[0] <= 12 ? x[0] : n[i].key.m.today, n[i].key.d.today = x[1] && x[1] <= 31 ? x[1] : n[i].key.d.today, n[i].key.y.today = x[2] ? x[2] : n[i].key.y.today, n[i].key.y.today > n[i].key.y.max && (n[i].key.y.max = n[i].key.y.today), n[i].key.y.today < n[i].key.y.min && (n[i].key.y.min = n[i].key.y.today)
                }
                e("<div>", {
                    class: "datedropper " + M + " " + C + " " + c + " " + y,
                    id: i,
                    html: e("<div>", {
                        class: "picker"
                    })
                }).appendTo("body"), r = {
                    id: i,
                    input: a,
                    element: e("#" + i)
                };
                for (var J in n[i].key) e("<ul>", {
                    class: "pick pick-" + J,
                    "data-k": J
                }).appendTo(z(".picker")), P(J);
                if (n[i].large) {
                    e("<div>", {
                        class: "pick-lg"
                    }).insertBefore(z(".pick-d")), e('<ul class="pick-lg-h"></ul><ul class="pick-lg-b"></ul>').appendTo(z(".pick-lg"));
                    for (var F = j(), O = 0; O < 7; O++) e("<li>", {
                        html: t[n[r.id].lang].weekdays.short[F[O]]
                    }).appendTo(z(".pick-lg .pick-lg-h"));
                    for (O = 0; O < 42; O++) e("<li>").appendTo(z(".pick-lg .pick-lg-b"))
                }
                e("<div>", {
                    class: "pick-btns"
                }).appendTo(z(".picker")), e("<div>", {
                    class: "pick-submit"
                }).appendTo(z(".pick-btns")), n[r.id].translate && e("<div>", {
                    class: "pick-btn pick-btn-lng"
                }).appendTo(z(".pick-btns")), n[r.id].large && e("<div>", {
                    class: "pick-btn pick-btn-sz"
                }).appendTo(z(".pick-btns")), "Y" != d && "m" != d || (z(".pick-d,.pick-btn-sz").hide(), r.element.addClass("picker-tiny"), "Y" == d && z(".pick-m,.pick-btn-lng").hide(), "m" == d && z(".pick-y").hide()), p && (l = !0, q()), r = null
            }
        }).focus(function(a) {
            a.preventDefault(), e(this).blur(), r && L(), r = {
                id: e(this).data("id"),
                input: e(this),
                element: e("#" + e(this).data("id"))
            }, p(), F(), G(), N(), r.element.hasClass("picker-modal") && e("body").append('<div class="picker-modal-overlay"></div>')
        })
    }
}(jQuery);
