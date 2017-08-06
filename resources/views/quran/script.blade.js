var backgroundColor = Cookies.get('quran_background_color');
var color = Cookies.get('quran_color');
if (backgroundColor) {
    $('.view .background').css({backgroundColor: backgroundColor});
}
if (color) {
    $('.view .content').css({color: color});
}

$(".bootstrap-colorpicker").colorpicker();

$('.bootstrap-colorpicker.text')
    .colorpicker().on('changeColor', function(e) {
        var color = e.color.toString('rgba');
        Cookies.set('quran_color', color);
        $('.view .content').css({color: color});
    }
);

$('.bootstrap-colorpicker.background')
    .colorpicker().on('changeColor', function(e) {
        var color = e.color.toString('rgba');
        Cookies.set('quran_background_color', color);
        $('.view .background').css({backgroundColor: color});
    }
);

var suras = {!! json_encode($suras) !!};

var formNavigator = $("#navigator");
var suraSelect = formNavigator.find("select[name=sura]");
var ayaStartSelect = formNavigator.find("select[name=aya_start]");
var ayaEndSelect = formNavigator.find("select[name=aya_end]");
formNavigator = $("#form-navigator");

function changeAyaSelectValues(suraId, ayaStart, ayaEnd) {
    var sura = suras[suraId - 1];
    ayaStartSelect.html('');
    ayaEndSelect.html('');
    for (var i = 1;i <= sura.count;i++) {
        var option =
            $("<option value='" + i + "'>" + i + "</option>");
        ayaStartSelect.append(option.clone());
        ayaEndSelect.append(option);
        ayaStartSelect.val(ayaStart);
        if (!ayaEnd) {
            ayaEnd = sura.count;
        }
        ayaEndSelect.val(ayaEnd);
    }
    formNavigator.attr(
        'href'
        , '{{  url("/") }}' + '/' + suraId + '/' + ayaStart + '/' + ayaEnd
    );
}

changeAyaSelectValues(
    suraSelect.val()
    , {{ $ayas->first()->aya_id }}
    , {{ $ayas->last()->aya_id }}
);

suraSelect.change(function () {
    changeAyaSelectValues(
        suraSelect.val()
        , 1
    );
});
ayaStartSelect.change(function () {
    changeAyaSelectValues(
        suraSelect.val()
        , ayaStartSelect.val()
        , ayaEndSelect.val()
    );
});
ayaEndSelect.change(function () {
    changeAyaSelectValues(
        suraSelect.val()
        , ayaStartSelect.val()
        , ayaEndSelect.val()
    );
});


