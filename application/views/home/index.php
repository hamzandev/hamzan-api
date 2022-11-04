<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API CI-3 by HamzanDev</title>
    <style>
        
        * {
            padding: 0;
            margin: 0;
        }
        
        .container {
            width: 80%;
            margin: 1rem auto;
        }

	li a {
		font-family: 'Fira Code', monospace;
	  }
        
        h1, h2, h3, h4, h5, small {
            font-family: 'Montserrat', arial, sans-serif;
        }
    </style>
</head>
<body>
    <div class="container">
        
        
        <h2>REST-API sederhana by : <a href="https://instagram.com/hamzanwahyu.me/" target="_blank"><pre style="display: inline">HamzanDev</pre></a></h2>
        <h3 style="display: block"><pre>Resources :</pre></h3>

        <ul>
            <li>
                <a href="<?= base_url('api/barang') ?>" target="_blank">
                    Semua Barang.
                </a>
            </li>
            <li>
                <a href="<?= base_url('api/barang/brg001') ?>" target="_blank">
                Barang berdasarkan kode/id nya.
                </a>
            </li>
            <li>
                <a href="<?= base_url('api/siswa') ?>" target="_blank">
                    Semua Siswa.
                </a>
            </li>
            <li>
                <a href="<?= base_url('api/siswa/10') ?>" target="_blank">
                    Siswa berdasarkan id nya.
                </a>
            </li>
        </ul>

    </div>
</body>
</html>