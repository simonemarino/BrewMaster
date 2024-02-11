<!DOCTYPE html>
<html>
<head>
  <title>Pagination.js with Punk API Example</title>
  <link href="https://cdn.jsdelivr.net/npm/paginationjs/dist/pagination.css" rel="stylesheet">
</head>
<body>

<div id="data-container"></div>

<div id="demo"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/paginationjs/dist/pagination.min.js"></script>

<script>
  $(function() {
    let dataContainer = $('#data-containe');
    $('#demo').pagination({
    dataSource: 'https://api.flickr.com/services/feeds/photos_public.gne?tags=cat&tagmode=any&format=json&jsoncallback=?',
    locator: 'items',
    totalNumberLocator: function(response) {
        // you can return totalNumber by analyzing response content
        return Math.floor(Math.random() * (1000 - 100)) + 100;
    },
    pageSize: 20,
    ajax: {
        beforeSend: function() {
            dataContainer.html('Loading data from flickr.com ...');
        }
    },
    callback: function(data, pagination) {
        // template method of yourself
        var html = template(data);
        dataContainer.html(html);
    }
})
  });
</script>

</body>
</html>
