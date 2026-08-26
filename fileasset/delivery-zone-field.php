<label for="zoneSearch" class="form-label">Search your street or a nearby landmark</label>
<div class="position-relative">
    <input type="text" id="zoneSearch" class="form-control" placeholder="e.g. Wimpy, Rumuola Road..." autocomplete="off">
    <div id="zoneSuggestions" class="list-group position-absolute w-100 shadow-sm d-none" style="z-index: 10; max-height: 220px; overflow-y: auto;"></div>
</div>
<input type="hidden" name="delivery_zone_id" id="delivery_zone_id">
<div id="selectedZoneDisplay" class="small text-muted mt-1"></div>