
$(function() {
    
    var hostid = document.getElementById("hostingsHelper").getAttribute("hosting-id");
        $.ajax({
        type:"GET",
        // url:"http://localhost/payu/hostings/validation?hostid="+hostid,
        url:"http://hostpayu.chaaruvi.com/hostings/validation?hostid="+hostid,
        success:function(res){
        var xtirit = JSON.parse(res);
        console.log(xtirit);
        if(xtirit['expire']==2){
                $(".hostingsHelper").append('<div class="modal fade" id="hostingsHelperModal" role="dialog"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> <h4 class="modal-title text-danger"><strong>'+xtirit['message']+'<strong></h4> </div> <div class="modal-body"> <h4><strong>Renew your expired panel before you lose them.</strong></h4> </div> <div class="modal-footer"> <a href="http://hostpayu.chaaruvi.com/payment?id='+hostid+'" class="btn btn-success">Renew</a> </div> </div> </div> </div>');
                $("#hostingsHelperModal").modal({
                backdrop: 'static',
                keyboard: false
                });
        }
        else if(xtirit['expire']==1){
            $(".hostingsHelper").append('<div class="modal fade" id="hostingsHelperModal" role="dialog"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> <button type="button" class="close" data-dismiss="modal">&times;</button> <h4 class="modal-title text-danger"><strong>'+xtirit['message']+'<strong></h4> </div> <div class="modal-body"> <h4><strong>Renew your expired panel before you lose them.</strong></h4> </div> <div class="modal-footer"> <a href="http://hostpayu.chaaruvi.com/payment?id='+hostid+'" class="btn btn-success">Renew</a> </div> </div> </div> </div>');
            $("#hostingsHelperModal").modal('show');
        }
        else{
            // $(".hostingsHelper").append('<div class="modal fade" id="hostingsHelperModal" role="dialog"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> <button type="button" class="close" data-dismiss="modal">&times;</button> <h4 class="modal-title">'+xtirit['message']+'</h4> </div> <div class="modal-body"> <h4><strong>Renew your panel before you lose them.</strong></h4> </div> <div class="modal-footer"> <a href="http://localhost/payu/payment?id='+hostid+'" class="btn btn-success">Renew</a> </div> </div> </div> </div>');
            // $("#hostingsHelperModal").modal({
            // backdrop: 'static',
            // keyboard: false
            // });
        }
        

        }
        }); 
});


// document.addEventListener('contextmenu', event => event.preventDefault());

// $(document).keydown(function (event) {
//     if (event.keyCode == 123) { // Prevent F12
//         return false;
//     } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
//         return false;
//     }
// });