
    const URL_API = $('#container').data('url');
    const URL_API_TOTAL = $('#container').data('totalUrl');
    const TOKEN = $('#tk').val();
    console.log(TOKEN);
    const getTotalItems = () => {
        $.ajax({
                    type: 'GET',
                    url: URL_API_TOTAL,
                    headers: {
                        'Authorization': 'Bearer ' + TOKEN
                    },
                    success: function(response) {
                        $('#totalItems').val(response.total_items);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
    }
    getTotalItems();

    const getData = (page,per_page) => {
        $.ajax({
                    type: 'GET',
                    url: URL_API,
                    data: {
                        page: page,
                        per_page: per_page
                    },
                    headers: {
                        'Authorization': 'Bearer ' + TOKEN
                    },
                    success: function(response) {
                        response = response.data
                        $('#container').empty();
                        $.each(response, function(index, beer) {
                            if(beer.image_url == null){
                                beer.image_url = 'https://images.punkapi.com/v2/keg.png';
                            }
                            var html = '<div class="m2 card crd-hover">';
                            html += '<div class="row no-gutters">';
                            html += '<div class="col-md-4">';
                            html += '<img src="' + beer.image_url + '" class="card-img" alt="' + beer.name + '">';
                            html += '</div>';
                            html += '<div class="col-md-8">';
                            html += '<div class="card-body">';
                            html += '<h5 class="card-title name">' + beer.name + '</h5>';
                            html += '<p class="card-text tx">' + beer.tagline + '</p>';
                            html += '<p class="card-text born">' + moment(beer.first_brewed, "MM/YYYY").format("MMM YY") + '</p>';
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                            $('#container').append(html);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
    }
    const setPerPage = async (event) => {
        let url = window.location.href;
        var per_page_old = url.substring(1).split("&")[1].split("=")[1];
        var selectElement = document.getElementById("per_page");
        selectElement.value = per_page_old;
    }
    const perPage = async (event) => {
        try {
            let page = 1
            let totalItems = $('#totalItems').val();
            let per_page =  parseInt(event.target.value);
            let totalPages = Math.ceil(totalItems / per_page);
            createPagination(totalPages, page,event.target.value);
        } catch (errors) {
            console.error(errors);
        }
    }

    /* Pagination */

    setTimeout(() => {
        $('.loading-bar').css('width', '100%');
        $('#per_page').show();
        $('#totitems').show();
        $('.loading-bar-container').fadeOut('slow');
        const element =  $(".pagination ul");
        let totalItems = $('#totalItems').val();
        $("#total-items").text(totalItems);
        let per_page =  parseInt($('#per_page').val());
        let totalPages = Math.ceil(totalItems / per_page);
        let page = 1;
        var htmlContent = createPagination(totalPages, page, per_page);
        element.html(htmlContent);
    }, 1000);

    function createPagination(totalPages, page,per_page){
        const element = document.querySelector(".pagination ul");
        $('#page').val(page);
        per_page = parseInt(per_page);
        getData(page,per_page);
        let liTag = '';
        let active;
        let beforePage = page - 1 ;
        let afterPage = page + 1;
        let lastPage = totalPages;
        if(page > 1){
            liTag += `<li class="btn prev" onclick="createPagination(${totalPages}, ${page - 1},${per_page})"><span><i class="fas fa-angle-left"></i> Prev</span></li>`;
        }

        if(page > 3){
            liTag += `<li class="first numb" onclick="createPagination(${totalPages}, 1,${per_page})"><span>1</span></li>`;
            if(page > 4){
                liTag += `<li class="dots"><span>...</span></li>`;
            }
        }


        if (page == totalPages) {
            beforePage = beforePage - 2;
            (beforePage < 0) ? beforePage = 0 : ''
        } else if (page == totalPages - 1) {
            beforePage = beforePage - 1;
            (beforePage < 0) ? beforePage = 0 : ''
        }

        if (page == 1) {
            afterPage = afterPage + 2;
        } else if (page == 2) {
            afterPage  = afterPage + 1;
        }

        for (var plength = beforePage; plength <= afterPage; plength++) {
            if (plength > totalPages) {
            continue;
            }
            if (plength == 0) {
                    plength = plength + 1;
            }
            if(page == plength){
            active = "active";
            }else{
                active = "";
            }
            liTag += `<li class="numb ${active}" onclick="createPagination(${totalPages}, ${plength},${per_page})"><span>${plength}</span></li>`;
        }
        lastPage = plength - 2
        if(page < totalPages - 1){
            if(page < totalPages - 2){
            liTag += `<li class="dots"><span>...</span></li>`;
            }
            if(lastPage != totalPages){
                liTag += `<li class="last numb" onclick="createPagination(${totalPages}, ${totalPages},${per_page})"><span>${totalPages}</span></li>`;
            }
        }

        if (page < totalPages) {
            liTag += `<li class="btn next" onclick="createPagination(${totalPages}, ${page + 1},${per_page})"><span>Next <i class="fas fa-angle-right"></i></span></li>`;
        }
        element.innerHTML = liTag;
        return liTag;
    }

    /* EndPagination */
