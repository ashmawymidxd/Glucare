@livewireScripts
<!-- bootstrap js file -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
<!-- slid sidebar file -->
<script src="{{ url('Dashboard/js/sidebar-slider.js') }}"></script>
@stack('js')
@yield('js')
<!-- expoert excel -->
<script>
    function exportTableToExcel() {
        const table = document.getElementById("DataTable");
        const wb = XLSX.utils.table_to_book(table);
        const wbout = XLSX.write(wb, {
            bookType: 'xlsx',
            type: 'binary'
        });

        function s2ab(s) {
            const buf = new ArrayBuffer(s.length);
            const view = new Uint8Array(buf);
            for (let i = 0; i < s.length; i++) {
                view[i] = s.charCodeAt(i) & 0xFF;
            }
            return buf;
        }

        const blob = new Blob([s2ab(wbout)], {
            type: "application/octet-stream"
        });
        const fileName = "table.xlsx";
        if (navigator.msSaveBlob) {
            navigator.msSaveBlob(blob, fileName);
        } else {
            const link = document.createElement("a");
            if (link.download !== undefined) {
                const url = URL.createObjectURL(blob);
                link.setAttribute("href", url);
                link.setAttribute("download", fileName);
                link.style.visibility = "hidden";
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }
        }
    }
</script>

<!-- export pdf -->
<script>
    function exportTableToPDF() {
        const table = document.getElementById("DataTable");
        html2canvas(table, {
            onrendered: function(canvas) {
                const imgData = canvas.toDataURL('image/png');
                const doc = new jsPDF();
                doc.addImage(imgData, 'PNG', 10, 0, -150, -200);
                doc.save('table.pdf');
            }
        });
    }
</script>

<!-- take snapshot -->
<script>
    function captureSnapshot() {
        html2canvas(document.getElementById("DataTable"))
            .then(function(canvas) {
                // Create an "a" element to trigger the download
                var link = document.createElement('a');
                link.href = canvas.toDataURL();
                link.download = 'snapshot.png';
                link.click();
            });
    }
</script>

<!-- print table data -->
<script>
    function printTable() {
        var printContents = document.getElementById("DataTableDiv").innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    }
</script>

<script>
    window.onload = () => {
        var currentUrl = window.location.href;
        document.querySelectorAll("a").forEach(function(link) {
            if (link.href === currentUrl) {
                link.parentElement.parentElement.parentElement.classList = 'gray-bg showMenus';
            }
        });
    };
</script>

