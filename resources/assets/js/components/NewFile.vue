<template>
    <div class="row">
        <div class="col-sm-6 p-2">
            <label for="category">Select Category</label>
            <select name="category" id="category" class="form-control">
                <option value="">Select Category</option>
            </select>
        </div>
        <div class="col-sm-6 p-2">
            <label for="sub_category">Select Sub Category</label>
            <select name="sub_category" id="sub_category" class="form-control">
                <option value="">Select Sub Category</option>
            </select>
        </div>
        <div class="col-sm-12 p-2">
            <label for="file">Chose a File</label>
            <input type="file" name="file" id="file" class="form-control"/>
        </div>
        <div class="col-sm-12 p-2">
            <label for="description">Write Description</label>
            <textarea name="description" id="description" rows="3" maxlength="250" placeholder="abc..."
                      class="form-control"></textarea>
        </div>
        <div class="p-2">
            <button class="btn btn-secondary" id="back-btn">Back</button>
            <button class="btn btn-primary">Submit</button>
        </div>
    </div>
</template>

<script>
    
</script>

<style scoped>

</style>