$(function(){

  var hide_elm = $('.header,.footer,.sidebar');
  $('#print').click(function(){
    
    hide_elm.addClass('print');
    $('.print-preview').append($('#preview').html());
    window.print();

    if(contentsCount === 3){
      $('div.item').addClass('contents3');
      hide_elm.removeClass('print');
    }else if(contentsCount === 2){
      $('div.item').addClass('contents2');
      hide_elm.removeClass('print');
    }else if(contentsCount === 1){
      $('div.item').addClass('contents1');
      hide_elm.removeClass('print');
    }
    $('.print-preview').children().remove();
  });

  var contentsCount = 3;
  $('#choice-contents-1').click(function(){
    $('.item').remove();
    contentsCount = 1; 
  });
  $('#choice-contents-2').click(function(){
    $('.item').remove();
    contentsCount = 2; 
  });
  $('#choice-contents-3').click(function(){
    $('.item').remove();
    contentsCount = 3; 
  });
  var offset = 0;
  $('.search-form').change(function(){
    offset = 0;
    $('#all_show_result').children().remove();
    getAllData($(this).val(), offset);
  });
  
  //view moreの追加
  $('.view_more').click(function(){
    console.log($(".item-sample").length)
    offset = $(".item-sample").length;
    var searchWord = $('.search-form').val();
    getAllData(searchWord, offset);
  });

  getAllData('',offset);

  $('.template').on('click',function(){
    var templateSearch = $(this).children().html();
    getTemplateData(templateSearch);
  });

  
  //ajax
  function getAllData(search_word, offset){
    $.ajax({
      url:"ajax_show_all.php",
      data:{
        search_word : search_word,
        offset : offset
      },
      type:'POST',
      datatype:'json',
      success: function(data){
        for(var i=0 ;i<data.length;i++){
          var sampleList = navSampleList(data[i].item_name, data[i].img, data[i].caption);
          $('#all_show_result').append(sampleList);
        }

        $(".item-sample").off().click(function(){
          var itemName = makeItemName($(this).find('.item_name').html());
          var itemCaption = makeItemCaption($(this).find('.item_caption').html());
          var itemImg = makeItemImg($(this).find('.nav_sample_img').html());
          var item = makeItem(itemName, itemCaption, itemImg);
          var deleteButton = makeDeleteButton(item);
          item.append(deleteButton);
          
          if(contentsCount === 3 && $("#preview").find("div.item").length === 1){
            itemImg.addClass("order-2");
            itemCaption.addClass("order-1");
          }
//*
          if(contentsCount === 3){
            item.find("div.contents3-d-flex").addClass("d-flex");
            item.addClass("contents3");
            item.find(".item-img").addClass("col-7");
            // $("#preview").find("img").css({"width":"226px","height":"170px"})
            item.find(".item-caption").addClass("col-5");
          }else if(contentsCount === 2){
            item.addClass("contents2");
            //item.find(".position-top-right").css({"top": "20px","font-size":"17px"});
            item.find(".item-img").addClass("mt-3");
          }else if(contentsCount === 1){
            item.addClass("contents1 mt-5");
            item.find(".position-top-right").css({"top": "30px","font-size":"17px"});
            item.find(".item-img").addClass("mt-3");
          }

          if($("#preview").find("div.item").length < contentsCount){
            $("#preview").append(item);
          }
        })
      },
      error: function(){
        console.log("通信失敗");
        console.log(data);
      }
    });
  }

  function getTemplateData(template_word){
    $.ajax({
      url:"ajax_show_all.php",
      data:{template_word : template_word},
      type:'POST',
      datatype:'json',
      success: function(data){
        for(var i=0 ;i<data.length;i++){
          var previewCaption = $("<pre contentEditable='true' class='preview-caption mt-1 mb-0'>");
          var text = '';
          data[i].caption.forEach(function( value ) {text += '<li>' + value + '</li>'});
          previewCaption.append("<ol class='mb-0'>" + text + "</ol>")

          var itemName = makeItemName("<p class='preview-name mb-0'>"+data[i].item_name+"</p>");
          var itemCaption = makeItemCaption(previewCaption);
          var itemImg = makeItemImg("<img src=img/"+data[i].img+"></img>");
          var item = makeItem(itemName, itemCaption, itemImg);
          var deleteButton = makeDeleteButton(item);
          item.append(deleteButton);
          
          if(contentsCount === 3 && $("#preview").find("div.item").length === 1){
            itemImg.addClass("order-2");
            itemCaption.addClass("order-1")
          }

          if(contentsCount === 3){
            item.find("div.contents3-d-flex").addClass("d-flex");
            item.addClass("contents3");
            item.find(".item-img").addClass("col-7");
            // $("#preview").find("img").css({"width":"226px","height":"170px"})
            item.find(".item-caption").addClass("col-5");
          }else if(contentsCount === 2){
            item.addClass("contents2");
            item.find(".position-top-right").css({"top": "20px","font-size":"17px"});
            item.find(".item-img").addClass("mt-3");
          }else if(contentsCount === 1){
            item.addClass("contents1 mt-5");
            item.find(".position-top-right").css({"top": "30px","font-size":"17px"});
            item.find(".item-img").addClass("mt-3");
          }

          if($("#preview").find("div.item").length < contentsCount){
          $("#preview").append(item);
          }
        }
      },
      error: function(){
        console.log("通信失敗");
        console.log(data);
      }
    });
  }
});