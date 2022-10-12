<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        * {
            font-size: 8px;
            font-family: 'Times New Roman';
        }

        td,
        th,
        tr,
        table {
            border-top: 1px solid black;
            border-collapse: collapse;
        }

        td.description,
        th.description {
            width: 75px;
            max-width: 75px;
        }

        td.quantity,
        th.quantity {
            width: 20px;
            max-width: 20px;
            word-break: break-all;
        }

        td.price,
        th.price {
            width: 60px;
            max-width: 60px;
            word-break: break-all;
        }

        .centered {
            text-align: center;
            align-content: center;
        }

        .ticket {
            width: 155px;
            max-width: 155px;
            height: 555px;
            max-height: : 555px;
        }

        img {
            max-width: inherit;
            width: inherit;
        }

        @media print {

            .hidden-print,
            .hidden-print * {
                display: none !important;
            }
        }
    </style>
    <title>Cetak Struk</title>
</head>

<body>
    <div class="ticket">
        <!-- <img src="<?= base_url() ?>/assets/images/logo2.png" alt="Logo"> -->
        <p class="centered">Struk Pembelian CV. Andika Emas Abadi
            <br>Subang</p>
        <br>
        <table width="100%">
            <tr>
                <td>Nama Toko</td>
                <td>:</td>
                <td><?= '' ?></td>
            </tr>
        </table>
        <br>
        <h3>Barang</h3>
        <table>
            <thead>
                <tr>
                    <th class="quantity">QP</th>
                    <th class="quantity">QB</th>
                    <th class="description">Barang</th>
                    <th class="price">Harga</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
        <br>
        <p class="centered">Terima kasih atas pembeliannya!
            <br>POWERED By SISAGU</p>
    </div>
    <button id="btnPrint" class="hidden-print">Print</button>
    <script>
        const $btnPrint = document.querySelector("#btnPrint");
        $btnPrint.addEventListener("click", () => {
            window.print();
        });
    </script>
</body>

</html>