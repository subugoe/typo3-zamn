$(function () {
  if (document.querySelector('.tx-zamn-hans')) {
    var position = document.querySelector('.tx-zamn-hans h2:nth-of-type(2)');

    var personList = $('.tx-zamn-hans ol:nth-of-type(2)').children('li');
    var alphabetList = document.createElement('div');
    alphabetList.setAttribute('class', 'alphabet-list');

    var doolist = [];
    $.each(personList, function (index, value) {
      var letter = $(value).children('a').text()[0];
      var lister = {
        'letter': letter,
        'position': index
      };

      if (doolist.filter(function (e) {
            return e.letter === letter
          }).length === 0) {
        doolist.push(lister);
      }
    });

    doolist.forEach(function (a, b) {
      var alink = document.createElement('a');
      alink.setAttribute('href', '#' + a.position);
      alink.setAttribute('class', 'alphabet-list-element -' + a.position);
      var alinkvalue = document.createTextNode(a.letter);

      alink.appendChild(alinkvalue);

      alphabetList.appendChild(alink);
    });

    $(position).append(alphabetList);
  }


  $('.alphabet-list a').click(function (e) {
    var targetClass = $(e.target).attr('href').replace('#', '');

    var targetElement = $('.tx-zamn-hans ol:nth-of-type(2) li:eq(' + targetClass + ')');

    $('html, body').animate({
      scrollTop: $(targetElement).offset().top
    }, 250);

    return false;
  });
});
