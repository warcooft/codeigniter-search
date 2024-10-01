<?php

namespace Aselsan\Search;

trait SearchTrait
{
    /**
     * Scope search function for CodeIgniter 4
     * 
     * @param string $keyword
     * @param boolean $matchAllFields
     * @return object
     */
    public function search($keyword, $matchAllFields = false)
    {
        if (empty($keyword)) {
            return $this;
        }

        $this->groupStart();

        foreach ($this->getSearchableFields() as $field) {
            $condition = $matchAllFields ? 'where' : 'orWhere';
            $this->{$condition}("$field LIKE", "%$keyword%");
        }

        $this->groupEnd();

        return $this;
    }

    /**
     * Get all searchable fields for CodeIgniter 4
     * 
     * @return array
     */
    protected function getSearchableFields()
    {
        $model = new static;

        $fields = $model->search ?? [];

        if (empty($fields)) {
            $fields = $this->allowedFields;

            $ignoredColumns = [
                $model->primaryKey,
                $model->createdField,
                $model->updatedField,
            ];

            if (property_exists($model, 'deletedField')) {
                $ignoredColumns[] = $model->deletedField;
            }

            $fields = array_diff($fields, $ignoredColumns);
        }

        return $fields;
    }
}
