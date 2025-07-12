<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Admission NOC</title>
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
            width: 220px;
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
            margin-left: 80px;
        }
        .info-table {
            margin-left: 20px;
        }
        .info-table td {
            vertical-align: top;
            padding-bottom: 3px;
        }
        .info-table td.label {
            width: 160px;
        }
        .right {
            text-align: right;
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

    <div class="center">
        <p><strong>TO WHOM IT MAY CONCERN</strong><br>
        No. {{ $letter_number }}</p>
    </div>

    <p>
        I have the honor to refer to the letter No. {{ $refer_letter_number }} dated {{ $refer_letter_date }} issued by the {{ $refer_letter }} of the Republic of Indonesia for;
    </p>

    <table class="info-table">
        <tr>
            <td class="label">Name</td>
            <td>: {{ $salutation }} {{ $name }}</td>
        </tr>
        <tr>
            <td class="label">Place & date of birth</td>
            <td>: {{ $birth_place }}, {{ $birth_date }}</td>
        </tr>
        <tr>
            <td class="label">Passport No</td>
            <td>: {{ $passport_number }}</td>
        </tr>
    </table>

    <p>
        It is further to state that {{ $salutation }} {{ $name }} wishes to study in {{ $major }} degree program at the <strong>International Islamic University Islamabad (IIUI)</strong>. The Embassy has no any objection if {{ $pronoun1 }} enrolled in the University’s above program.
    </p>

    <p>
        In this regard, I would appreciate if the esteemed office could kindly forward the attached documents to the concerned authorities for the further process of {{ $pronoun2 }} admission at IIU Islamabad at the earliest.
    </p>

    <p>Thank you for your kind cooperation.</p>

    <p class="right">Islamabad, {{ $surat_date }}</p>

    <div class="signature">
        <img class="signature-image" src="{{ public_path('assets/images/letter/sign.png') }}" alt="Signature">
    </div>

    <div class="footer">
        <img class="footer-image" src="{{ public_path('assets/images/letter/footer.png') }}" alt="Footer Address">
    </div>

</body>
</html>