var slider = document.getElementById("myRange");
var output = document.getElementById("price");
output.value = slider.value;
slider.oninput = function() {
    output.value = logslider(this.value);
}

function logslider(position) {
    // position will be between 0 and 100
    var minp = 0;
    var maxp = 100000;

    // The result should be between 100 an 10000000
    var minv = Math.log(1);
    var maxv = Math.log(100000);

    // calculate adjustment factor
    var scale = (maxv-minv) / (maxp-minp);

    return Math.round(Math.exp(minv + scale*(position-minp)));
}

$('#search').on('keyup',function(){
    $value=$('#search').val();
    $price=$('#price').val();
    $category=$('#category').val();
    $.ajax({
        type : 'get',
        url : '/search',
        data:{'search':$value,'price':$price,'category':$category},
        success:function(data){
            $('tbody').html(data);
        }
    });
});
$('#myRange').on('input',function(){
    $value=$('#search').val();
    $price=$('#price').val();
    $category=$('#category').val();
    $.ajax({
        type : 'get',
        url : '/search',
        data:{'search':$value,'price':$price,'category':$category},
        success:function(data){
            $('tbody').html(data);
        }
    });
});
$('#category').on('input',function(){
    $value=$('#search').val();
    $price=$('#price').val();
    $category=$('#category').val();
    $.ajax({
        type : 'get',
        url : '/search',
        data:{'search':$value,'price':$price,'category':$category},
        success:function(data){
            $('tbody').html(data);
        }
    });
});

$('#price').on('keyup',function(){
    $value=$('#search').val();
    $price=$('#price').val();
    $category=$('#category').val();
    $.ajax({
        type : 'get',
        url : '/search',
        data:{'search':$value,'price':$price,'category':$category},
        success:function(data){
            $('tbody').html(data);
        }
    });
});

module.exports= {
    search: search
}

