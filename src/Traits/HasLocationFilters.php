<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

trait HasLocationFilters
{
    // ─── Private Helpers ────────────────────────────────────────────────────────

    private function searchTextLike(string $field, ?string $value): static
    {
        $value = $this->parseString(field: $field, value: $value);

        if ($value === null) {
            return $this;
        }

        return $this->search(field: $field, operator: $this->getDatabaseLikeOperator(), value: $value);
    }

    private function searchNumeric(string $field, ?float $value, string $operator = '='): static
    {
        $value = $this->parseFloat(field: $field, value: $value);

        if ($value === null) {
            return $this;
        }

        return $this->search(field: $field, operator: $operator, value: $value);
    }

    // ─── Location ───────────────────────────────────────────────────────────────

    public function location(string $field = 'location', ?string $value = null, string $operator = '='): static
    {
        return $this->text(field: $field, value: $value, operator: $operator);
    }

    public function locationLike(string $field = 'location', ?string $value = null): static
    {
        return $this->searchTextLike(field: $field, value: $value);
    }

    // ─── Country ────────────────────────────────────────────────────────────────

    public function country(string $field = 'country', ?string $value = null, string $operator = '='): static
    {
        return $this->text(field: $field, value: $value, operator: $operator);
    }

    public function countryLike(string $field = 'country', ?string $value = null): static
    {
        return $this->searchTextLike(field: $field, value: $value);
    }

    public function countryIso2(string $field = 'country_iso2', ?string $value = null, string $operator = '='): static
    {
        return $this->text(field: $field, value: $value, operator: $operator);
    }

    public function countryIso3(string $field = 'country_iso3', ?string $value = null, string $operator = '='): static
    {
        return $this->text(field: $field, value: $value, operator: $operator);
    }

    // ─── City / State / Street ───────────────────────────────────────────────────

    public function city(string $field = 'city', ?string $value = null, string $operator = '='): static
    {
        return $this->text(field: $field, value: $value, operator: $operator);
    }

    public function cityLike(string $field = 'city', ?string $value = null): static
    {
        return $this->searchTextLike(field: $field, value: $value);
    }

    public function state(string $field = 'state', ?string $value = null, string $operator = '='): static
    {
        return $this->text(field: $field, value: $value, operator: $operator);
    }

    public function stateLike(string $field = 'state', ?string $value = null): static
    {
        return $this->searchTextLike(field: $field, value: $value);
    }

    public function street(string $field = 'street', ?string $value = null, string $operator = '='): static
    {
        return $this->text(field: $field, value: $value, operator: $operator);
    }

    public function streetLike(string $field = 'street', ?string $value = null): static
    {
        return $this->searchTextLike(field: $field, value: $value);
    }

    // ─── Address / House / Postal ────────────────────────────────────────────────

    public function address(string $field = 'address', ?string $value = null, string $operator = '='): static
    {
        return $this->text(field: $field, value: $value, operator: $operator);
    }

    public function addressLike(string $field = 'address', ?string $value = null): static
    {
        return $this->searchTextLike(field: $field, value: $value);
    }

    public function houseNumber(string $field = 'house_number', ?string $value = null, string $operator = '='): static
    {
        return $this->text(field: $field, value: $value, operator: $operator);
    }

    public function houseNumberLike(string $field = 'house_number', ?string $value = null): static
    {
        return $this->searchTextLike(field: $field, value: $value);
    }

    public function postalCode(string $field = 'postal_code', ?string $value = null, string $operator = '='): static
    {
        return $this->text(field: $field, value: $value, operator: $operator);
    }

    public function zipCode(string $field = 'zip_code', ?string $value = null, string $operator = '='): static
    {
        return $this->text(field: $field, value: $value, operator: $operator);
    }

    // ─── Coordinates ────────────────────────────────────────────────────────────

    public function coordinates(string $field = 'coordinates', ?string $value = null, string $operator = '='): static
    {
        return $this->text(field: $field, value: $value, operator: $operator);
    }

    public function latitude(string $field = 'latitude', ?float $value = null, string $operator = '='): static
    {
        return $this->searchNumeric(field: $field, value: $value, operator: $operator);
    }

    public function longitude(string $field = 'longitude', ?float $value = null, string $operator = '='): static
    {
        return $this->searchNumeric(field: $field, value: $value, operator: $operator);
    }

    // ─── Distance / Radius ───────────────────────────────────────────────────────

    public function distance(string $field = 'distance', ?float $value = null, string $operator = '='): static
    {
        return $this->searchNumeric(field: $field, value: $value, operator: $operator);
    }

    public function radius(string $field = 'radius', ?float $value = null, string $operator = '='): static
    {
        return $this->searchNumeric(field: $field, value: $value, operator: $operator);
    }

    public function radiusUnit(string $field = 'radius_unit', ?string $value = null, string $operator = '='): static
    {
        return $this->text(field: $field, value: $value, operator: $operator);
    }

    public function radiusUnitInKm(
        string $field = 'radius_unit',
        ?string $value = null,
        string $operator = '='
    ): static {
        return $this->radiusUnit(field: $field, value: $value, operator: $operator);
    }

    public function radiusUnitInMiles(
        string $field = 'radius_unit',
        ?string $value = null,
        string $operator = '='
    ): static {
        return $this->radiusUnit(field: $field, value: $value, operator: $operator);
    }

    // ─── Region / District / Neighborhood ───────────────────────────────────────

    public function region(string $field = 'region', ?string $value = null, string $operator = '='): static
    {
        return $this->text(field: $field, value: $value, operator: $operator);
    }

    public function regionLike(string $field = 'region', ?string $value = null): static
    {
        return $this->searchTextLike(field: $field, value: $value);
    }

    public function district(string $field = 'district', ?string $value = null, string $operator = '='): static
    {
        return $this->text(field: $field, value: $value, operator: $operator);
    }

    public function districtLike(string $field = 'district', ?string $value = null): static
    {
        return $this->searchTextLike(field: $field, value: $value);
    }

    public function neighborhood(string $field = 'neighborhood', ?string $value = null, string $operator = '='): static
    {
        return $this->text(field: $field, value: $value, operator: $operator);
    }

    public function neighborhoodLike(string $field = 'neighborhood', ?string $value = null): static
    {
        return $this->searchTextLike(field: $field, value: $value);
    }

    public function suburb(string $field = 'suburb', ?string $value = null, string $operator = '='): static
    {
        return $this->text(field: $field, value: $value, operator: $operator);
    }

    public function suburbLike(string $field = 'suburb', ?string $value = null): static
    {
        return $this->searchTextLike(field: $field, value: $value);
    }

    // ─── Building / Floor / Apartment ────────────────────────────────────────────

    public function building(string $field = 'building', ?string $value = null, string $operator = '='): static
    {
        return $this->text(field: $field, value: $value, operator: $operator);
    }

    public function buildingLike(string $field = 'building', ?string $value = null): static
    {
        return $this->searchTextLike(field: $field, value: $value);
    }

    public function floor(string $field = 'floor', ?string $value = null, string $operator = '='): static
    {
        return $this->text(field: $field, value: $value, operator: $operator);
    }

    public function apartment(string $field = 'apartment', ?string $value = null, string $operator = '='): static
    {
        return $this->text(field: $field, value: $value, operator: $operator);
    }

    public function apartmentLike(string $field = 'apartment', ?string $value = null): static
    {
        return $this->searchTextLike(field: $field, value: $value);
    }

    public function unit(string $field = 'unit', ?string $value = null, string $operator = '='): static
    {
        return $this->text(field: $field, value: $value, operator: $operator);
    }

    // ─── Timezone / Locale ───────────────────────────────────────────────────────

    public function timezone(string $field = 'timezone', ?string $value = null, string $operator = '='): static
    {
        return $this->text(field: $field, value: $value, operator: $operator);
    }

    public function timezoneLike(string $field = 'timezone', ?string $value = null): static
    {
        return $this->searchTextLike(field: $field, value: $value);
    }

    public function locale(string $field = 'locale', ?string $value = null, string $operator = '='): static
    {
        return $this->text(field: $field, value: $value, operator: $operator);
    }

    public function continent(string $field = 'continent', ?string $value = null, string $operator = '='): static
    {
        return $this->text(field: $field, value: $value, operator: $operator);
    }

    public function continentLike(string $field = 'continent', ?string $value = null): static
    {
        return $this->searchTextLike(field: $field, value: $value);
    }

    // ─── Geo-bounding Box ────────────────────────────────────────────────────────

    public function latitudeMin(string $field = 'latitude_min', ?float $value = null, string $operator = '='): static
    {
        return $this->searchNumeric(field: $field, value: $value, operator: $operator);
    }

    public function latitudeMax(string $field = 'latitude_max', ?float $value = null, string $operator = '='): static
    {
        return $this->searchNumeric(field: $field, value: $value, operator: $operator);
    }

    public function longitudeMin(string $field = 'longitude_min', ?float $value = null, string $operator = '='): static
    {
        return $this->searchNumeric(field: $field, value: $value, operator: $operator);
    }

    public function longitudeMax(string $field = 'longitude_max', ?float $value = null, string $operator = '='): static
    {
        return $this->searchNumeric(field: $field, value: $value, operator: $operator);
    }

    public function altitude(string $field = 'altitude', ?float $value = null, string $operator = '='): static
    {
        return $this->searchNumeric(field: $field, value: $value, operator: $operator);
    }

    // ─── IP / Virtual Location ───────────────────────────────────────────────────

    public function ipAddress(string $field = 'ip_address', ?string $value = null, string $operator = '='): static
    {
        return $this->text(field: $field, value: $value, operator: $operator);
    }

    public function ipAddressLike(string $field = 'ip_address', ?string $value = null): static
    {
        return $this->searchTextLike(field: $field, value: $value);
    }
}
