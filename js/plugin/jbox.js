$(function(){
    new jBox("Tooltip", {
        attach: ".jbox-0",
    });

    new jBox("Tooltip", {
        attach: ".jbox-1",
        title: "ポインターの位置いじれる",
        pointer: "right:60"
    });

    new jBox("Tooltip", {
        attach: ".jbox-2",
        width: 300,
        height: 200,
        title: "サイズ変更",
    });

    new jBox("Tooltip", {
        attach: ".jbox-3",
        animation: "tada",
        title: 'アニメーション'
    });

    new jBox("Modal", {
        attach: ".jbox-4",
        title: 'My Modal Window',
        content: 'jbox-4'
    });

    new jBox("Modal", {
        attach: ".jbox-5",
        width: 300,
        height: 200,
        title: 'My Modal Window',
        content: '<i>サイズ変更</i>'
    });

    new jBox("Modal", {
        attach: ".jbox-6",
        title: "Modal Animation",
        animation: "tada",
        content: 'アニメーション'
    });

    new jBox("Modal", {
        attach: ".jbox-7",
        title: "Modal Animation",
        animation: "flip",
        content: 'アニメーション'
    });
});