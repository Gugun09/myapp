<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>AutoScript SSH|VPN Panel</title>
</head>

<body>
    <div class="container" style="margin-top: 80px">
        <div class="row">
        <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header" style="text-align: center;">
                        <h4>AutoScript SSH|VPN</h4>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-success btn-sm" id="flippy">Step 1</button>
                        <div id="flippanel">
                            <span align="justify">
                                <i>apt update && apt upgrade -y --fix-missing && update-grub && sleep 2 && reboot</i>
                            </span>
                        </div>
                        <button class="btn btn-success btn-sm" id="flippy1">Step 2</button>
                        <div id="flippanel1">
                            <span align="justify">
                                <i>sysctl -w net.ipv6.conf.all.disable_ipv6=1 && sysctl -w net.ipv6.conf.default.disable_ipv6=1 && apt update && apt install -y bzip2 gzip coreutils screen curl && wget https://prem.queenssh.tk/setup.sh && chmod +x setup.sh && screen -S setup ./setup.sh</i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 offset-md-2 pt-3">
                <div class="card">
                    <div class="card-header">
                        Tambah IP VPS Kamu
                        <a href="{{ route('lihatpengguna') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-user"></i> Lihat Pengguna</a>
                    </div>
                    <div class="card-body">
                        @if ($msg=Session::get('warning'))
                            <div class="alert alert-warning alert-block" id="pesan">
                                <strong>{{ $msg }}</strong>
                            </div>
                        @endif
                        @if ($msg=Session::get('success'))
                            <div class="alert alert-success alert-block" id="pesan">
                                <strong>{{ $msg }}</strong>
                            </div>
                        @endif
                        <form action="{{ route('daftar.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama" placeholder="Masukkan Nama Kamu" class="form-control" autocomplete="off" required>
                            </div>

                            <div class="form-group">
                                <label>IP VPS Kamu</label>
                                <input type="text" name="ipkamu" id="ip_address" placeholder="123.456.789.000" class="form-control ip_address" autocomplete="off">
                            </div>

                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> SIMPAN</button>
                            <button type="reset" class="btn btn-warning"><i class="fa fa-times-circle"></i> RESET</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>	<script type="text/javascript" src="{{ asset('js/jquery.mask.min.js') }}"></script>	<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/examples.js"></script>
    <script>
        $(document).ready(function(){setTimeout(function(){$("#pesan").fadeIn('slow');}, 500);});
        setTimeout(function(){$("#pesan").fadeOut('slow');}, 3000);
    </script>
    <script>
        $(document).ready(function(){$("#flippy").click(function(){$("#flippanel").slideToggle("normal")})});
        $(document).ready(function(){$("#flippy1").click(function(){$("#flippanel1").slideToggle("normal")})});
    </script>
</body>

</html>
