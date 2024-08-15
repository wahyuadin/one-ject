<!DOCTYPE html>
<html>
	<head>
         <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
		<title>Halaman Laporan | Preview</title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
            <div class="table-responsive">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
                        <table>
							<tr>
								<td class="title">
									<img src="https://i.ibb.co/J2SFqsQ/oneject.png" style="width:30%; max-width: auto" />
								</td>
                                <?php
                                    date_default_timezone_set('Asia/Jakarta');
                                    $date = date("d-m-Y H:i");
                                ?>
                                <td style="text-align: right">
                                    <p style="text-align: right">Tanggal : <br>
                                        Author :
                                    </p>
                                </td>
								<td>
                                    <p style="text-align: right">{{ $date }}<br>
                                        {{Auth::user()->name}}
                                    </p>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="3">
						<table>
							<tr>
                                <td><h5 style="text-align: center">LAPORAN DATA TEST<br><p style="text-align: center"></p></h5></td>
							</tr>
						</table>
					</td>
				</tr>


			</table>
                    <table class="table-striped">
                        <thead style="text-align: center; padding: 10%">
                          <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Mulai</th>
                                <th>Deadline</th>
                          </tr>
                        </thead>
                    <tbody style="padding: 10%; text-align: center;">
                        @foreach ($pdf as $d)
                      <tr>
                            <?php $no= 1;?>
                            <th scope="row">{{$no++}}</th>
                            <td>{{$d->title}}</td>
                            <td>{{$d->start}}</td>
                            <td>{{$d->end}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                </div>
	</body>
</html>
