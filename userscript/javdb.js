// ==UserScript==
// @name        Everything JavDB
// @namespace   lmly9193
// @require     https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js
// @match       https://javdb*.com/*
// @grant       none
// @version     1.0
// @author      lmly9193
// @description Search ID with Everything in your PC.
// ==/UserScript==

var multiple = '';

videos = $('#videos');

boxs = $(videos).find('.box');
$(boxs).each(function (index, box) {
    let uid = $(this).find('.uid').text();

    if (index == 0) {
        multiple += `${uid}`;
    } else {
        multiple += `|${uid}`;
    }

    $(this).append(`<a class="button is-warning is-small is-outlined is-fullwidth" href="es://${uid}" style="margin-top: 5px;">在電腦搜尋</a>`);
    $(this).append(`<a class="button is-primary is-small is-outlined is-fullwidth" href="https://jable.tv/search/${uid}/" style="margin-top: 5px;" target="_blank">Jable.TV</a>`);
    $(this).append(`<a class="button is-warning is-small is-outlined is-fullwidth" href="https://hpjav.tv/tw?s=${uid}" style="margin-top: 5px;" target="_blank">hpjav.tv</a>`);
});

$(`<div><p class="mb-3"><a class="button is-warning is-outlined is-fullwidth" style="display: block" href="es://${multiple}">在電腦搜尋全部</a></p></div>`).insertBefore($(videos));

vid = $('.movie-panel-info .first-block [data-clipboard-text]').data('clipboard-text');
$('.movie-panel-info').append(`
<div class="panel-block">
    <div class="columns">
        <div class="column">
            <div class="buttons are-small review-buttons">
                <a class="button is-warning is-outlined" href="es://${vid}">在電腦搜尋</a>
                <a class="button is-primary is-outlined" href="https://jable.tv/search/${vid}/" target="_blank">Jable.TV</a>
                <a class="button is-warning is-outlined" href="https://hpjav.tv/tw?s=${vid}" target="_blank">hpjav.tv</a>
            </div>
        </div>
    </div>
</div>`);

// columns = $('.section-addition').closest('.columns');
// $(columns).append(`
// <div class="column">
//     <p><a class="button is-warning" style="display: block" href="es://${multiple}">在電腦搜尋全部</a></p>
// </div>`);
