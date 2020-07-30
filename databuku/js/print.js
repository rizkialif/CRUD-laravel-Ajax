function printReport()
{
    var doc = new jsPDF()

    // Title
    doc.setFontSize(20);
    doc.setFontType('bold');
    doc.text(80, 20, 'Daftar Produk');
    doc.setLineWidth(0,5);
    doc.line(80, 25, 127, 25);

    // Table Heading
    doc.setFontSize(14);
    doc.setLineWidth(0,1);
    doc.line(8, 35, 200, 35);
    doc.line(8, 45, 200, 45);
    doc.line(8, 35, 8, 45);
    doc.line(18, 35, 18, 45);
    doc.line(88, 35, 88, 45);
    doc.line(118, 35, 118, 45);
    doc.line(158, 35, 158, 45);
    doc.line(200, 35, 200, 45);

    doc.text(11, 42, '#');
    doc.text(21, 42, 'Nama Produk');
    doc.text(91, 42, 'Stok');
    doc.text(121, 42, 'Harga');
    doc.text(161, 42, 'Kategori');

    $.ajax({
        type: 'GET',
        url: 'http://localhost/Web/KN-CLASS/invetori_api/public/get/produk/list',
        success: function(result) {
            doc.setFontType('normal');

            var no = 1;
            var a = 55; // point bawah
            var b = 45; // point atas
            var c = 51; // point tengah
            
            $.each(result.data, function(key, val) {
                doc.line(8, a, 200, a);
                doc.line(8, b, 8, a);
                doc.line(18, b, 18, a);
                doc.line(88, b, 88, a);
                doc.line(118, b, 118, a);
                doc.line(158, b, 158, a);
                doc.line(200, b, 200, a);

                doc.text(11, c, no.toString());
                doc.text(21, c, val.nama);
                doc.text(91, c, val.stok.toString());
                doc.text(121, c, val.harga.toString());
                doc.text(161, c, val.kategori);

                a += 10;
                b += 10;
                c += 10;
                no++;
            });

            doc.save('LaporanProduk');
        },
        error: function(xhr) {
            console.log(xhr.responseText);
        }
    });
}