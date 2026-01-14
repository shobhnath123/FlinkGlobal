<x-front-guest-layout>
   <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 20px; }
        .container { max-width: 900px; background: #fff; padding: 40px; margin: 0 auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        
        /* Header Styling matching Source 1 & 4 */
        .header { border-bottom: 2px solid #000; margin-bottom: 20px; padding-bottom: 10px; display: flex; justify-content: space-between; align-items: center; }
        .logo { font-size: 24px; font-weight: bold; color: #333; }
        .sub-logo { font-size: 12px; color: #666; }
        
        h2 { border-bottom: 1px solid #ccc; padding-bottom: 5px; margin-top: 30px; font-size: 18px; color: #2c3e50; }
        
        /* Form Grid System */
        .form-row { display: flex; flex-wrap: wrap; gap: 15px; margin-bottom: 15px; }
        .form-group { flex: 1; min-width: 200px; }
        .form-group.full-width { flex: 100%; }
        .form-group.third { flex: 0 0 30%; }
        
        label { display: block; font-weight: bold; font-size: 12px; margin-bottom: 5px; color: #333; }
        input[type="text"], input[type="date"], input[type="email"], input[type="tel"] {
            width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;
        }
        
        /* Directors Section */
        .director-box { background: #f9f9f9; padding: 15px; border: 1px solid #ddd; margin-bottom: 15px; }
        .director-title { font-weight: bold; margin-bottom: 10px; color: #555; }

        /* Terms Section */
        .terms { background: #eee; padding: 15px; font-size: 12px; margin-top: 20px; }
        .btn-submit { background: #28a745; color: white; border: none; padding: 15px 30px; font-size: 16px; cursor: pointer; display: block; width: 100%; margin-top: 20px; }
        .btn-submit:hover { background: #218838; }
    </style>
<div class="container">
    <div class="header">
        <div>
            <div class="logo">
                <img src="{{ asset("flinktech_logo.webp") }}" alt="FlinkTech Logo" style="height: 40px; vertical-align: middle;">
            </div>
           
        </div>
        <div style="text-align:right; font-size: 12px;">
            <strong>FlinkGlobal Limited T/A FlinkTech</strong><br>
            23 Stewart Gibson Place, Manurewa<br>
            Web: www.flinkglobal.com
        </div>
    </div>

    <h1 style="text-align: center;">Business - Cash Account Application</h1>

    <form action="submit.php" method="POST">
        
        <h2>Client Details:</h2>
        <div class="form-row">
            <div class="form-group full-width">
                <label>Full Name (Contact Person):</label>
                <input type="text" name="contact_person_name" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Physical Address:</label>
                <input type="text" name="physical_address">
            </div>
            <div class="form-group third">
                <label>Postcode:</label>
                <input type="text" name="physical_postcode">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Billing Address:</label>
                <input type="text" name="billing_address">
            </div>
            <div class="form-group third">
                <label>Postcode:</label>
                <input type="text" name="billing_postcode">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Driver's Licence No:</label>
                <input type="text" name="client_licence">
            </div>
            <div class="form-group">
                <label>D.O.B:</label>
                <input type="date" name="client_dob">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Email Address:</label>
                <input type="email" name="client_email" required>
            </div>
            <div class="form-group">
                <label>Mobile No:</label>
                <input type="tel" name="client_mobile">
            </div>
        </div>

        <h2>Business Details:</h2>
        <div class="form-row">
            <div class="form-group full-width">
                <label>Legal Name:</label>
                <input type="text" name="legal_name">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group full-width">
                <label>Trading Name:</label>
                <input type="text" name="trading_name">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>GST No:</label>
                <input type="text" name="gst_no">
            </div>
            <div class="form-group">
                <label>Company Number:</label>
                <input type="text" name="company_number">
            </div>
            <div class="form-group">
                <label>NZBN Number:</label>
                <input type="text" name="nzbn_number">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Nature of Business:</label>
                <input type="text" name="nature_business">
            </div>
            <div class="form-group">
                <label>Date Incorp:</label>
                <input type="date" name="date_incorp">
            </div>
        </div>

        <h2>Directors Details:</h2>
        
        <?php for($i=1; $i<=3; $i++): ?>
        <div class="director-box">
            <div class="director-title">Director (<?php echo $i; ?>)</div>
            <div class="form-row">
                <div class="form-group">
                    <label>Full Name:</label>
                    <input type="text" name="directors[<?php echo $i; ?>][name]">
                </div>
                <div class="form-group">
                    <label>D.O.B:</label>
                    <input type="date" name="directors[<?php echo $i; ?>][dob]">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Driver's Licence No:</label>
                    <input type="text" name="directors[<?php echo $i; ?>][licence]">
                </div>
                <div class="form-group">
                    <label>Mobile No:</label>
                    <input type="text" name="directors[<?php echo $i; ?>][mobile]">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Private Address:</label>
                    <input type="text" name="directors[<?php echo $i; ?>][address]">
                </div>
                <div class="form-group third">
                    <label>Postcode:</label>
                    <input type="text" name="directors[<?php echo $i; ?>][postcode]">
                </div>
            </div>
        </div>
        <?php endfor; ?>

        <div class="terms">
            <p><strong>Terms of Trade:</strong> I certify that the above information is true and correct and that I accept the supply of credit by the Supplier.</p>
            <p>I have read and understood the TERMS AND CONDITIONS OF TRADE of Flinkglobal Limited T/A FlinkTech.</p>
            <label>
                <input type="checkbox" name="terms_agreed" value="1" required> I agree to the Terms & Conditions and authorise the use of my personal information.
            </label>
        </div>

        <button type="submit" class="btn-submit">Submit Application</button>
    </form>
</div>


</x-front-guest-layout>