$(document).ready(function(){
    $.ajax({
        url:"category.php",
        // dataType:"JSON",
        success: function(data){
            //add the class to sidebar
            var jsonArray=$.parseJSON(data);
            $.each(jsonArray,function (index,jsonObject) {
                $(".category").append("<option value='"+jsonObject+"'>"+jsonObject+"</option>");
            });
        },
        error: function () {
            alert("error loading file");
        }
    });
    
});
