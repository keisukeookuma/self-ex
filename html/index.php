<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>リハビリメニュー作成！</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
<nav class="navbar  navbar-dark fixed-top flex-md-nowrap p-0 shadow navbar-expand">
  <div class="col-2 col-md-5 navbar-brand">
    <a class="mr-0 " href="top.php">Reha Menu</a>
  </div>
  <div class="col-10 col-md-7">
    <ul class="navbar-nav px-3">
        <li class="menu-change d-flex">
            <p class="nav-link m-0">メニュー数:</p>
            <ul class="nav nav-pills">
                <li><a id="choice-contents-1" class="nav-link" data-toggle="pill" href="#" role="tab">1</a></li>
                <li><a id="choice-contents-2" class="nav-link" data-toggle="pill" href="#" role="tab">2</a></li>
                <li><a id="choice-contents-3" class="nav-link active" data-toggle="pill" href="#" role="tab">3</a></li>
            </ul>
        </li>
        <li>
            <a class="downloadBtn nav-link ml-3" href="#">ダウンロード</a>
        </li>
        <li>
            <a class="nav-link ml-3" href="#" id="print">印刷</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">ログイン</a>
        </li>
    </ul>
  </div>
</nav>
<div class="container-fluid noprint">
    <div class="row pt-5">
        <div class="hamburger-nav col-md-5">
            <nav-side class="col-md-3 d-md-block pt-2 px-0">
                <div class="nav nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active nav-a-size px-0 text-center m-auto" data-toggle="pill" href="#v-pills-original" role="tab" aria-controls="v-pills-original" aria-selected="true">
                        <svg class="bi bi-plus-square" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 3.5a.5.5 0 01.5.5v4a.5.5 0 01-.5.5H4a.5.5 0 010-1h3.5V4a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M7.5 8a.5.5 0 01.5-.5h4a.5.5 0 010 1H8.5V12a.5.5 0 01-1 0V8z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M14 1H2a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V2a1 1 0 00-1-1zM2 0a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2H2z" clip-rule="evenodd"/>
                        </svg>  
                        <p>トレーニング追加</p>
                    </a>
                    <a class="nav-link nav-a-size px-0 pt-3 text-center m-auto" data-toggle="pill" href="#v-pills-sample1" role="tab" aria-controls="v-pills-sample1" aria-selected="false">
                        <svg class="bi bi-textarea-t" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M14 9a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4zM2 9a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M1.5 2.5A1.5 1.5 0 013 1h10a1.5 1.5 0 011.5 1.5v4h-1v-4A.5.5 0 0013 2H3a.5.5 0 00-.5.5v4h-1v-4zm1 7v4a.5.5 0 00.5.5h10a.5.5 0 00.5-.5v-4h1v4A1.5 1.5 0 0113 15H3a1.5 1.5 0 01-1.5-1.5v-4h1z" clip-rule="evenodd"/>
                            <path d="M11.434 4H4.566L4.5 5.994h.386c.21-1.252.612-1.446 2.173-1.495l.343-.011v6.343c0 .537-.116.665-1.049.748V12h3.294v-.421c-.938-.083-1.054-.21-1.054-.748V4.488l.348.01c1.56.05 1.963.244 2.173 1.496h.386L11.434 4z"/>
                        </svg>
                        <p>テンプレート</p>
                    </a>
                    <a class="nav-link nav-a-size px-0 pt-3 text-center m-auto" data-toggle="pill" href="#v-pills-sample2" role="tab" aria-controls="v-pills-sample3" aria-selected="false">
                        <svg class="bi bi-people" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.995-.944v-.002.002zM7.022 13h7.956a.274.274 0 00.014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C13.688 10.629 12.718 10 11 10c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 00.022.004zm7.973.056v-.002.002zM11 7a2 2 0 100-4 2 2 0 000 4zm3-2a3 3 0 11-6 0 3 3 0 016 0zM6.936 9.28a5.88 5.88 0 00-1.23-.247A7.35 7.35 0 005 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 015 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10c-1.668.02-2.615.64-3.16 1.276C1.163 11.97 1 12.739 1 13h3c0-1.045.323-2.086.92-3zM1.5 5.5a3 3 0 116 0 3 3 0 01-6 0zm3-2a2 2 0 100 4 2 2 0 000-4z" clip-rule="evenodd"/>
                        </svg>
                        <p>介護部門</p>
                    </a>
                    <a class="nav-link nav-a-size px-0 pt-3 text-center m-auto"  href="opinion.php">
                        <svg class="bi bi-inbox-fill" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3.81 4.063A1.5 1.5 0 014.98 3.5h6.04a1.5 1.5 0 011.17.563l3.7 4.625a.5.5 0 01-.78.624l-3.7-4.624a.5.5 0 00-.39-.188H4.98a.5.5 0 00-.39.188L.89 9.312a.5.5 0 11-.78-.624l3.7-4.625z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M.125 8.67A.5.5 0 01.5 8.5h5A.5.5 0 016 9c0 .828.625 2 2 2s2-1.172 2-2a.5.5 0 01.5-.5h5a.5.5 0 01.496.562l-.39 3.124a1.5 1.5 0 01-1.489 1.314H1.883a1.5 1.5 0 01-1.489-1.314l-.39-3.124a.5.5 0 01.121-.393z" clip-rule="evenodd"/>
                        </svg>
                        <p>ご意見箱</p>
                    </a>
                    <a class="nav-link nav-a-size px-0 text-center pt-4 m-auto" href="manual.php">
                        <svg class="bi bi-info-square" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                        <circle cx="8" cy="4.5" r="1"/>
                        </svg>
                        <p>使い方ガイド</p>
                    </a>
                </div>
            </nav-side>
            <div class="hamburger-item-choice col-md-9 d-md-block pt-2 px-4 overflow-auto">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-original" role="tabpanel" aria-labelledby="v-pills-original-tab">
                        <div class="search mx-auto">
                            <input class="search-form form-control form-bg" type="text" placeholder="部位や病名で検索可能！" aria-label="検索">
                        </div>
                        <div class="overflow-auto search-item-height">
                            <ul id="all_show_result" class="d-flex flex-wrap justify-content-around"></ul>
                            <div class="view_more text-center"><button class='btn'>もっと見る</button></div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-sample1" role="tabpanel" aria-labelledby="v-pills-sample1-tab">
                        <!-- <div class="search mx-auto">
                            <input class="form-control form-control-dark  text-light bg-dark" type="text" placeholder="部位や病名で検索可能！" aria-label="検索">
                        </div> -->
                        <ul id="template_list" class="px-0 pt-3">
                            <li class="nav-item template">
                                <a class="nav-link" href="#">腰椎椎間板ヘルニア</a>
                            </li>
                            <li class="nav-item template">
                                <a class="nav-link" href="#">腰部脊柱管狭窄症</a>
                            </li>
                            <li class="nav-item template">
                                <a class="nav-link" href="#">変形性膝関節症</a>
                            </li>
                            <!-- <li class="nav-item template">
                                <a class="nav-link" href="#">肩関節周囲炎</a>
                            </li> -->
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="v-pills-sample2" role="tabpanel" aria-labelledby="v-pills-sample3-tab">
                        <ul id="sample3" class="px-0 pt-3">
                            <li class="nav-item template">
                                <a class="nav-link" href="#">セラバンド体操</a>
                            </li>
                            <li class="nav-item template">
                                <a class="nav-link" href="#">座ってできる体操</a>
                            </li>
                            <li class="nav-item template">
                                <a class="nav-link" href="#">立ってできる体操</a>
                            </li>
                            <li class="nav-item template">
                                <a class="nav-link" href="#">ベッドでできる体操</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <main role="main" class="col-md-7 ml-sm-auto pt-2 px-0 ">
            <div class="preview-scroll ">
            <!-- <div class="overflow-auto" style="width:100%; height: 662vh;"> -->
                <div class="container responsive-mb">
                    <div class="tab-content p-3 d-flex justify-content-center">
                        <div class="preview-margin">
                            <div id="preview" class="tab-pane fade show active m-0">
                                <h1 class="text-center" contentEditable="true">リハビリメニュー</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div class="hamburger-menu d-md-none">
        <div class="menu-trigger" href="#">
          <p>自主トレ選択</p>
        </div>
    </div>
</div>
<div class="print-preview">
    <img src="" alt="" id="canvas-image">
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
  window.jQuery || document.write('<script src="./js/jquery-3.5.1.min.js"><\/script>')
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> 
<script src=js/index_function.js></script>
<script src="js/index.js"></script>
<script src='js/index_responsive.js'></script>
<script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>
<script src='js/html2canvas.min.js'></script>
<script>
    var mq = window.matchMedia( "(min-width: 670px)" );
    if (mq.matches) {
        $('.preview-scroll').addClass('overflow-auto preview-scroll-size');
    } else {
        $('.preview-scroll').removeClass('overflow-auto preview-scroll-size');
    }
    
    function scrollToTop() {
        scrollTo(0, 0);
    }

    // var scale = 'scale(1)';
    $(".downloadBtn").click(function(){
        // document.body.style.webkitTransform =  scale;
        scrollToTop();
        $('.preview-btn').addClass('d-none');
        html2canvas(document.querySelector("#preview"),{scale:4}).then(function(canvas){
            $('.preview-print').append(canvas);
            if(canvas.msToBlob){
                // alert('Internet Explorerではダウンロードは行なえません')
                var blob = canvas.msToBlob();
                window.navigator.msSaveOrOpenBlob(blob, 'reha-menu.png');
            }else{
                let downloadEle = document.createElement("a");
                downloadEle.href = canvas.toDataURL("image/png");
                downloadEle.download = "reha-menu.png";
                downloadEle.click();
            }
        });
        $('canvas').remove();
        $('.preview-btn').removeClass('d-none')
    });

    $("#print").click(function(print){
        $('.preview-btn').addClass('d-none');
        var hide_elm = $('.header,.footer,.sidebar');
        hide_elm.addClass('print');
        html2canvas(document.querySelector("#preview"),{scale:4}).then(function(canvas){
            var imageData = canvas.toDataURL();
            $('.print-preview')
                .html("<img id='Image' src=" + imageData + " style='width:100%;'></img>")
        });
        setTimeout(function() {
            window.print();
        }, 150);
        $('.print-preview').children().remove();
        $('.preview-btn').removeClass('d-none');
    });
</script>
</body>
</html>