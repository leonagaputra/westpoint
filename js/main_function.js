var main = {
    base_url : null,
    base_app : null,
    overlay : null,
    temp : null,
    interval : null
}

function show_message(str, title, width)
{
    if(title == undefined)title = "Pesan"
    var html = "<div id='message'>";
    html += str;
    html += "</div>";

    $("#message").unbind();
    $("#message").remove();
    $("body").append(html);
    $("#message").dialog({
        title :title,
        resizable:false,
        modal : true,
        draggable : false,
        width : width ? width : 300
    });
}

function show_loading() {
    var opts = {
		lines: 13, // The number of lines to draw
		length: 11, // The length of each line
		width: 5, // The line thickness
		radius: 17, // The radius of the inner circle
		corners: 1, // Corner roundness (0..1)
		rotate: 0, // The rotation offset
		color: '#FFF', // #rgb or #rrggbb
		speed: 1, // Rounds per second
		trail: 60, // Afterglow percentage
		shadow: false, // Whether to render a shadow
		hwaccel: false, // Whether to use hardware acceleration
		className: 'spinner', // The CSS class to assign to the spinner
		zIndex: 2e9, // The z-index (defaults to 2000000000)
		top: 'auto', // Top position relative to parent in px
		left: 'auto' // Left position relative to parent in px
	};
	var target = document.createElement("div");
	document.body.appendChild(target);
	var spinner = new Spinner(opts).spin(target);
	this.overlay = iosOverlay({
		text: "Loading",
		spinner: spinner
	});

	
}

function hide_overlay(){
    window.setTimeout(function() {
            this.overlay.hide();
    }, 2000);
}

function show_success_loading(status){
    var img = main.base_url+"img/check.png";
    var text = "Success";
    if(status != 1){
        img = main.base_url+"img/cross.png";
        text = "Error";
    }
    this.overlay.update({
            icon: img,
            text: text
    });
    
    hide_overlay();
}

function show_home(){
    $.ajax({
        type:"POST",
        //data:"id="+id,
        dataType:"html",
        url:main.base_url+"index.php/menu/show_beranda",
        success:function(msg){            
            $("#right").empty();
            var html = msg;
            
            $("#right").append(html);
            html = null;
        }
    });
}

function edit_detail(obj, hdr_id, dtl_id){
    //console.log($(obj).children());
    //$(obj).children();
    main.temp = $($(obj).parent().parent()).html();
    var title = $($(obj).parent().parent().children()[0]).text();
    var desc = $($(obj).parent().parent().children()[1]).html();
    $($(obj).parent().parent().children()[0]).html("\
        <input type='hidden' name='hdr_id' id='hdr_id' value='"+hdr_id+"'>\n\
        <input type='hidden' name='dtl_id' id='dtl_id' value='"+dtl_id+"'>\n\
        <input type='text' id='dtl_title' name='dtl_title' value='"+title+"'>");
    var textarea = "<textarea class='som' cols='50' rows='4' name='dtl_desc' id='dtl_desc'>";
    textarea += desc;
    textarea += "</textarea>";
    $($(obj).parent().parent().children()[1]).html(textarea);
    $(obj).next().show();
    $(obj).next().next().show();
    //console.log(editbutton);
    $(".editbutton").hide();        
    $('.som').summernote();
}

function cancel_edit(obj) {
    $(".editbutton").show();
    $(".updatebutton").hide();
    $($(obj).parent().parent()).html(main.temp);
    main.temp = null;
}

function save_edit(obj) {
    $(".editbutton").show();
    $(".updatebutton").hide();
    var hdr_id = $("#hdr_id").val();
    var dtl_id = $("#dtl_id").val();
    var title = $("#dtl_title").val();
    var desc = $("#dtl_desc").code();
    var result = "";
    result += "hdr_id=" + hdr_id;
    result += "&dtl_id=" + dtl_id;
    result += "&title=" + title;
    result += "&desc=" + desc.replace(/&nbsp;/g," ");

    show_loading();
    $.ajax({
        type: "POST",
        dataType: "JSON",
        data: result,
        url: main.base_url + "index.php/backend/update_detail",
        error: function (jqxhr, exc) {
            show_success_loading(0);
        },
        success: function (msg) {
            //msgs = $.parseJSON(msg);
            //console.log(msg);
            show_success_loading(1);
            $($(obj).parent().parent().children()[0]).html(title);
            $($(obj).parent().parent().children()[1]).html(desc);
        }
    });
}

function submit_header(obj) {
    var result = "";

    result += "id=";
    result += $("#hdr input[name=id]").val();
    result += "&";
    result += "title=";
    result += $("#hdr input[name=title]").val();
    result += "&";
    result += "desc=";
    result += $(".summernote").code().replace(/&nbsp;/g," ");
    result += "&";

    //alert(result);
    //return;
    //console.log(result);
    show_loading();
    $.ajax({
        type: "POST",
        dataType: "JSON",
        data: result,
        url: main.base_url + "index.php/backend/update_header",
        error: function (jqxhr, exc) {
            show_success_loading(0);
        },
        success: function (msg) {
            //msgs = $.parseJSON(msg);
            //console.log(msg);
            show_success_loading(1);
        }
    });
}

function reset_header(obj) {
    var result = "";
    result += "id=";
    result += $("#hdr input[name=id]").val();
    show_loading();
    $.ajax({
        type: "POST",
        dataType: "JSON",
        data: result,
        url: main.base_url + "index.php/backend/reset_header",
        error: function (jqxhr, exc) {
            show_success_loading(0);
        },
        success: function (msg) {
            //msgs = $.parseJSON(msg);
            //console.log(msg);
            $("#hdr input[name=title]").val(msg.VTITLE);
            $("#hdr_desc").code(msg.VDESC);
            hide_overlay();
        }
    });
}

function update_information(obj) {
    var result = $("#information_form").serialize();
    
    show_loading();
    $.ajax({
        type: "POST",
        dataType: "JSON",
        data: result,
        url: main.base_url + "index.php/backend/update_information",
        error: function (jqxhr, exc) {
            show_success_loading(0);
        },
        success: function (msg) {
            //msgs = $.parseJSON(msg);
            //console.log(msg);
            $("#hdr input[name=title]").val(msg.VTITLE);
            $("#hdr_desc").code(msg.VDESC);
            show_success_loading(1);
        }
    });
}

function paket_dialog(i, soal_id){
    //alert(i);;
    var title = $("#paket_title_"+i).text();
    var titlesh = $("#paket_titlesh_"+i).text();
    var color_class = $("#paket_class_"+i).attr('class');
    var desc = $("#paket_desc_"+i).text();
    //console.log(title);
    //console.log(titlesh);
    //console.log(color_class);
    $("#modal_title").text(title);
    $("#modal_title2").text(title);
    $("#modal_titlesh").text(titlesh);
    $("#modal_class").attr("class", "");
    $("#modal_class").addClass(color_class);
    $("#modal_desc").text(desc);
    
    if (typeof soal_id === "undefined"){
        $("#paket_id").val(i);
    }
    else{
        if(soal_id == 0){
            $("#btn-latihan,#btn-quis,#btn-ujian").hide();
        } else {
            //isi href dari masing2 button
            $("#btn-latihan").attr("href", main.base_url + "index.php/backend/latihan/" + soal_id);
            $("#btn-quis").attr("href", main.base_url + "index.php/backend/quis/" + soal_id);
            $("#btn-ujian").attr("href", main.base_url + "index.php/backend/ujian/" + soal_id);
            $("#btn-latihan,#btn-quis,#btn-ujian").show();
        }
    }
    
    
    //show modals
    $("#detail_modal").modal('show');
}

function cek_jawaban_latihan(obj, id, jawab){
    var kunci_jawaban = $("#divAnswer_" + id).find('.jq-hdnakqb').text();
    
    if(kunci_jawaban.toUpperCase() == jawab.toUpperCase()){
        //benar
        $('#divAnswer_' + id).show('slow');
        $(this).css("color","green");
        $("#cek_" + jawab + "_" + id).remove();
        $("#opsi_" + jawab + "_" + id).append('<i id="cek_' + jawab + '_' + id +'" class="fa fa-check" style="color:green;"></i>');
    } else {
        //salah
        //$(this).css("opacity","0.2");
        $("#opsi_" + jawab + "_" + id).css("opacity", "0.2");
    }    
}

function submit_quis(){
    var nilai;
    var jumlah_soal = $('input[name=jumlah_soal]').val();
    var jumlah_empty = 0;
    for(var i=1; i<=jumlah_soal; i++){
        nilai = $('input:radio[name=soal_'+i+']:checked').val();
        if (typeof nilai === "undefined")jumlah_empty++;
    }        
    var yakin = confirm("jumlah soal yang belum terjawab : " + jumlah_empty+ "\nApakah Anda yakin tetap lanjut?");
    if(yakin){
        $("#form_quis").submit();
    }
}

function startTimer(duration, display) {
    var start = Date.now(),
        diff,
        minutes,
        seconds;
    function timer() {
        // get the number of seconds that have elapsed since 
        // startTimer() was called
        diff = duration - (((Date.now() - start) / 1000) | 0);
        //console.log(diff);
        // does the same job as parseInt truncates the float
        minutes = (diff / 60) | 0;
        seconds = (diff % 60) | 0;

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds; 

        if (diff <= 0) {
            // add one second so that the count down starts at the full duration
            // example 05:00 not 04:59
            //start = Date.now() + 1000;            
            clearInterval(main.interval);
            $("#form_quis").submit();
        }
    };
    // we don't want to wait a full second before the timer starts
    
    timer();
    main.interval = setInterval(timer, 1000);        
       
}

function startUjian(){
    var timeLength = $("#time_length").val();//data yg kita punya dalam satuan menit
    //alert(timeLength);
    var ujianTime = 60 * timeLength,//ubah dalam satuan second
    //var ujianTime = 10,
            display = document.querySelector('title');
        startTimer(ujianTime, display);
}