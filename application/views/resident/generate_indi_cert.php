<div style="margin-bottom:80px"></div>
<p class="m-t-40">TO WHOM IT MAY CONCERN:</p>
<p style="text-indent: 40px;">
    This is to certify that
    <b>
        <?= strtoupper($resident->firstname . ' ' . $resident->middlename . ' ' . $resident->lastname) ?>
    </b>,
    <?= ucwords($resident->gender) ?>, <?= floor((time() - strtotime($resident->birthdate)) / 31556926); ?>
    years old,
    <?= ucwords($resident->civilstatus) ?>, <?= ucwords($resident->citizenship) ?>
    and a duly resident of this barangay belongs to the indigent family.
</p>
<p style="text-indent: 40px;">
    This certification is issued upon <?= $this->session->flashdata('gender') != 'her' ? '<u>his</u>\her' : 'his\<u>her</u>' ?> request for whatever legal purpose it may serve.
</p>
<p style="text-indent: 40px;">
    Issued this <?= date('jS') ?> day of
    <?= date('F') ?>, <?= date('Y') ?> at <?= $info->brgy_name . ', ' . $info->town . ', ' . $info->province ?>.</p>
<div style="margin-bottom:150px"></div>