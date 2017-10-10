[{$smarty.block.parent}]
<tr>
    <td class="edittext">
        Tracking-ID [psSeaTracker]
    </td>
    <td class="edittext">
        <input type="text" class="editinput" size="15" maxlength="[{$edit->oxuser__psseatracker_gclid->fldmax_length}]" name="editval[oxuser__psseatracker_gclid]" value="[{ $edit->oxuser__psseatracker_gclid->value }]" [{ $readonly }]>
        [{ $edit->oxuser__psseatracker_date->value }]
    </td>
</tr>