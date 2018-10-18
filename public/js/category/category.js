$(document).ready(function() {





//    var table = $('#data_table tbody'),rIndex;
//    console.log(table);
//    var len = table.rows.length;
//    alert(len);
//    for(var q = 0; q < len; q++)
//    {
//        console.log(table.rows[q]);
//        table.rows[q].onclick = function()
//        {
//            alert(this.cells[0]);
//            rIndex = this.rowIndex;
//            $('#title').val(this.cells[0]);
//            console.log(rIndex);
//        }
//    }

    $.noConflict();
    months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    var society_name = 'Committee Member List';
    var date = new Date();
    var day = date.getDate();
    var month = months[date.getMonth()];
    var year = date.getFullYear();
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var seconds = date.getSeconds();

    oTable = $('#data_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ordering": false,
        "lengthMenu": [[10, 25, 50, 100, 500], [10, 25, 50, 100, 500]],
        "ajax": "category_data",
        "columns": [
            {data: 'DT_Row_Index', orderable: false, searchable: false},
            {data: 'title', name: 'title'},
            {data: 'description', name: 'description', searchable: true},
            {data: 'slug', name: 'slug', searchable: true},
        ],
        "dom": '<"row"<"col-sm-4"l><"col-sm-4"B><"col-sm-4"f>>tip',
        buttons: [
            {
                extend: 'pdf',
                text: '<span class="fa fa-file-pdf-o"></span> PDF',
                filename: 'Category',
                title: 'Title',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [0, 1, 2, 3]

                },
                customize: function(doc) {

                    doc.content[1].table.widths = ['25%', '25%', '25%', '25%'];
                    doc.defaultStyle.alignment = 'left';
                    doc.styles.tableHeader.alignment = 'left';
                    //Remove the title created by datatTables
                    doc.content.splice(0, 1);
                    //Create a date string that we use in the footer. Format is dd-mm-yyyy
                    months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                    var now = new Date();
                    var mm = months[now.getMonth()];
                    var jsDate = now.getDate() + '-' + (mm) + '-' + now.getFullYear();
                    var time = now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds();
                    var hours = date.getHours();
                    var minutes = date.getMinutes();
                    var ampm = hours >= 12 ? 'PM' : 'AM';
                    hours = hours % 12;
                    hours = hours ? hours : 12; // the hour '0' should be '12'
                    minutes = minutes < 10 ? '0' + minutes : minutes;
                    var strTime = hours + ':' + minutes + ' ' + ampm;
                    doc.pageMargins = [20, 60, 20, 20];
                    // Crea
                    doc['header'] = (function() {

                        return {
                            columns: [
                                {
                                    margin: [150, 20, 0, 300],
                                    fontSize: 16,
                                    text: 'Title'
                                },
                                {
                                    margin: [0, 5, 10, 300],
                                    alignment: 'right',
                                    text: [{text: 'Report is generated on: ', italics: true}, {text: jsDate.toString(), italics: true}, {text: ' at ', italics: true}, {text: strTime, italics: true}]
                                }

                            ],
                            //margin: 20
                        }
                    });
                    doc['footer'] = (function(page, pages) {
                        return {
                            columns: [
                                {
                                    margin: [20, 0, 20, 0],
                                    alignment: 'left',
                                    text: ['Report auto generated ']
                                },
                                {
                                    margin: [0, 0, 20, 0],
                                    alignment: 'right',
                                    text: ['Page ', {text: page.toString()}, ' of ', {text: pages.toString()}]
                                }
                            ],
                            //margin: 50

                        }
                    });
                    var objLayout = {};
                    objLayout['hLineWidth'] = function(i) {
                        return .5;
                    };
                    objLayout['vLineWidth'] = function(i) {
                        return .5;
                    };
                    objLayout['hLineColor'] = function(i) {
                        return '#aaa';
                    };
                    objLayout['vLineColor'] = function(i) {
                        return '#aaa';
                    };
                    objLayout['paddingLeft'] = function(i) {
                        return 4;
                    };
                    objLayout['paddingRight'] = function(i) {
                        return 4;
                    };
                    doc.content[0].layout = objLayout;
                }
            },
            {
                extend: 'csvHtml5',
                filename: 'file_name',
                text: '<i class="fa fa-file-text-o"></i> CSV',
                filename:'Category',
                        titleAttr: 'CSV',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [0, 1, 2, 3]
                },
            }

        ],
    });

    $('#data_table tbody').on('click', 'tr', function() {
        var data = oTable.row(this).data();
        $('#category').val(data.id).trigger("change");
        $('#title').val(data.title);
        $('#description').text(data.description);
    });


});

