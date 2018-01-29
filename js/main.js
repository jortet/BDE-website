function main() {

  $('.demasquer').hide();
  $('.texte').hide();
//  $('.div_photos').hide();


  $('.photo').hover( function() {
    $(this).parents(".membre").find('.texte').slideToggle(90);
  })

  $('.actualite').click( function() {
    var preview = $(this).find(".post > .preview");
    var article = $(this).find(".post > .demasquer");
    preview.hide();
    preview.toggle(0);
    article.toggle(250);
	});

  /*$(".album_photo").click( function() {
    $(this).find('.div_photos').slideToggle(900);
  });*/
}

main();
