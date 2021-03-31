$(function(){
  $(".colorbox_exam_single").colorbox({
    opacity: 0.7
  });

  $(".colorbox_exam_slide").colorbox({
    rel: 'slideshow',
    slideshow: true,
    slideshowSpeed: 3000,
    maxWidth: "90%",
    maxHeight: "90%",
    opacity: 0.7
  });

  $(".colorbox_exam_iframe").colorbox({
    iframe: true,
    maxWidth: "100%",
    maxHeight: "100%",
    opacity: 0.7
  });
});
