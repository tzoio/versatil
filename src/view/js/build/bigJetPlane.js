$(document).ready(function(){
  var btnNext = $('#next')
  var btnPrev = $('#prev')
  var bannerAtual = 0
  var bannerAnterior
  var intervalo
  var banners = $('.banner-img').find('img')
  var totalBanners = $(banners).toArray().length
  var page = window.location.href.split("/")
  page = page[page.length-1]
  var synthesis = $('.synthesis')

  setPage()
  setAside()
  $('nav ul li a[href="'+page+'"]').parent().addClass('active')//setActive navbar



  if (getCookie('banner') === undefined ) {//define o banner a ser iniciado
    $(banners).eq(0).addClass('show')
    bannerAnterior = totalBanners-1
    bannerAtual = 0
    document.cookie = 'banner=0'
  }else {
    bannerAnterior = bannerAtual
    bannerAtual = getCookie('banner')
    updateBannerImg(bannerAnterior, bannerAtual)
  }

//events
  $(btnNext).click(function(){
    removeIntevaloBanner()
    nextBannerImg()
    createIntevaloBanner()
  })


  $(btnPrev).click(function() {
    removeIntevaloBanner()
    prevBannerImg()
    createIntevaloBanner()
  })
//endevents

//intervalo
  createIntevaloBanner()
  fixSynthesis()
  $('body').height($('body').height()+$('footer').height())


//endintervalo



//functions
  function fixSynthesis() {
    $(synthesis).each(function() {
      var text  = $(this).find('p').text()
      if (text.length>143) {

        var newText = text.slice(0,140)+'...'
        $(this).find('p').text(newText)

      }
    })
  }

  function nextBannerImg(){
    if (bannerAtual >= totalBanners-1) {
      bannerAnterior = bannerAtual
      bannerAtual = 0
      updateBannerImg(bannerAnterior, bannerAtual)
    }else{
      bannerAnterior = bannerAtual
      bannerAtual++
      updateBannerImg(bannerAnterior, bannerAtual)
    }
  }

  function prevBannerImg() {
    var goto,hide
    if (bannerAtual <= 0) {

      goto = totalBanners-1
      hide = bannerAtual
      bannerAtual = goto
      updateBannerImg(hide, goto)
    } else {

      hide = bannerAtual
      goto = bannerAtual-1
      bannerAtual = goto
      updateBannerImg(hide, goto)
    }
  }

  function updateBannerImg(hide, goto){
    $(banners).eq(hide).hide().removeClass('show')
    $(banners).eq(goto).fadeIn('fast','linear').addClass('show')
    document.cookie = 'banner='+goto
  }

  function getCookie(cookie){
    var storagedCookie = document.cookie.split(';')

    for (var i=0; i<storagedCookie.length; i++) {
      if (start = storagedCookie[i].search(cookie+'=') != -1) {
        return storagedCookie[i].slice(start+cookie.length, storagedCookie[i].length);
        break;
      }
    }
  }

  function createIntevaloBanner() {
    intervalo = setInterval(nextBannerImg, 5000)
  }

  function removeIntevaloBanner() {
    clearInterval(intervalo)
  }

  function setPage() {
    if (page === '') {
      page = 'index.php'
    }else if (page == 'adicionar-noticia.php') {
      
      var postImgs = []
      var path

      $.get('imagens.html', function(data) {//pega todas as imagens da pasta img/post e coloca no array postImgs
        $(data).find('img').each(function(index) {
          postImgs[index] = $(this).attr('src')
        })//fecha each

        $('#imgLink').val(postImgs[aleatorio(postImgs.length)])//ALTERAR O CAMINHO SE A PASTA DAS IMAGENS FOR ALTERADA
      })//fecha $.get
    } else if (page == 'noticia.php') {       

        updateBannerImg = function (){
          $(btnPrev).hide()
          $(btnNext).hide()
          var src = $('backimg').attr('src')
          console.log('<img src="'+src+'"/>')
          $('.banner-img').append('<img id="not" src="'+src+'"/>')
          $('#not').fadeIn('fast','linear').addClass('show')
          removeIntevaloBanner() 
        }
    }//fecha if pages
  }//fecha setPage


  function setAside() {
    
    var versiculos = []
    var path

    $.get('versiculos.html', function(data) {//pega todas as imagens da pasta img/post e coloca no array postImgs
      
      $(data).children().each(function(index) {
        versiculos[index] = $(this).find('p').html()
      })//fecha each
      
      $('aside').find('p').html(versiculos[aleatorio(versiculos.length)])
    })//fecha $.get
  }//fecha setPage


  /**
  * @return retorna um valor aleatorio entre 0 o limite especificado como parametro
  */
  function aleatorio(limite) {
    return Math.floor(Math.random() * (limite))
  }
//endfunctions


})
