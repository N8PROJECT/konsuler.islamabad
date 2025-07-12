<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>IBBC NOC Letter</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 10pt;
            line-height: 1.5;
            margin: 40px;
        }
        .center {
            text-align: center;
        }
        .mt-2 { margin-top: 15px; }
        .mt-4 { margin-top: 30px; }
        .signature {
            width: 200px;
            text-align: center;
            float: right;
        }
        img.logo {
            width: 300px;
            margin-bottom: 10px;
        }
        img.signature-image {
            width: 220px;
            margin-top: 10px;
        }
        .footer {
            position: fixed;
            bottom: 10px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        img.footer-image {
            display: block;
            width: auto;
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

    <div class="center">
        <img class="logo" src="{{ public_path('assets/images/letter/logo.png') }}" alt="Embassy Logo">
    </div>

    <div>
        <p>No. {{ $letter_number }}</p>

        <p class="mt-2">
            The Deputy Director<br>
            Inter Board Committee of Chairman (IBCC)<br>
            Government of Pakistan<br>
            Islamabad.
        </p>

        <p class="mt-2"><strong>Subject: Request to HSSC Equivalence Certificate</strong></p>

        <p class="mt-2">Dear Sir,</p>

        <p>
            I have the honor to inform you that the following Indonesian student:
        </p>

        <table style="margin-top: 10px;">
            <tr>
                <td style="padding-right: 10px;">Name</td>
                <td>: {{ $salutation }} {{ $name }}</td>
            </tr>
            <tr>
                <td style="padding-right: 10px;">Date & Place of Birth</td>
                <td>: {{ $birth_place }}, {{ $birth_date }}</td>
            </tr>
            <tr>
                <td style="padding-right: 10px;">Passport No</td>
                <td>: {{ $passport_number }}</td>
            </tr>
        </table>

        <p>
            is the holder of {{ $last_education }} dated {{ $graduation_date }} (copy enclosed), which has been granted to {{ $pronoun2 }} after completing 12 years of education. This is considered equivalent to the Higher Secondary School Certificate (HSSC) of the educational system in Pakistan.
        </p>

        <p>
            In this regard, it would be highly appreciated if the esteemed IBCC may kindly issue equivalence certificate of HSSC {{ $salutation }} {{ $name }} for further continuation of {{ $pronoun2 }} study at the {{ $universitas_selanjutnya }}.
        </p>

        <p>
            Thanking you for your kind cooperation and with profound regards.
        </p>

        <p style="text-align: right;">Islamabad, {{ $surat_date }}</p>

        <div class="signature">
            <img class="signature-image" src="{{ public_path('assets/images/letter/sign.png') }}" alt="Signature">
        </div>
    </div>

    <div class="footer">
        <img class="footer-image" src="{{ public_path('assets/images/letter/footer.png') }}" alt="Footer Address">
    </div>

</body>
</html>