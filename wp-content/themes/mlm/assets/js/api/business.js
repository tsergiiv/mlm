function getPackages(url, business_id) {
    $.ajax({
        url: url,
        dataType: 'json',
        type: 'post',
        data: {
            business_id: business_id
        },
        success: function( data ){
            console.log(data);
            processPackages(data);
        },
        error: function( jqXhr, textStatus, errorThrown ){
            console.log( errorThrown );
        }
    });
}