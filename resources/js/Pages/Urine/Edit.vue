<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { useToast } from "vue-toastification";
import { ref } from "vue";

const props = defineProps({
  medicalTechnologists: Array,
  urine: Object,
});

const form = useForm({
  date_of_report: props.urine.date_of_report,
  first_name: props.urine.first_name,
  last_name: props.urine.last_name,
  middle_name: props.urine.middle_name,
  age: props.urine.age,
  sex: props.urine.sex,
  ward: props.urine.ward,
  requesting_physician: props.urine.requesting_physician,
  macro_color: props.urine.macro_color,
  macro_transparency: props.urine.macro_transparency,
  macro_sp_gravity: props.urine.macro_sp_gravity,
  macro_reaction_ph: props.urine.macro_reaction_ph,
  macro_albumin: props.urine.macro_albumin,
  macro_sugar: props.urine.macro_sugar,
  micro_epithelial_cells: props.urine.micro_epithelial_cells,
  micro_red_cells: props.urine.micro_red_cells,
  micro_pus_cells: props.urine.micro_pus_cells,
  micro_bacteria: props.urine.micro_bacteria,
  micro_casts: props.urine.micro_casts,
  others: props.urine.others,
  pt_result: props.urine.pt_result,
  pt_brand_name: props.urine.pt_brand_name,
  pt_lot_no: props.urine.pt_lot_no,
  pt_expiry_date: props.urine.pt_expiry_date,
  analyst_med_tech_id: props.urine.analyst_med_tech_id,
  verified_by_med_tech_id: props.urine.verified_by_med_tech_id,
});

const submit = () => {
  form.put(route("urines.update", props.urine.id), {
    onSuccess: () => {
      const toast = useToast();
      toast.success("Urine record updated successfully", {
        timeout: 3000,
      });
    },
  });
};
</script>

<template>
  <Head title="Edit Urine" />

  <AuthenticatedLayout>
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Urine</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item">
              <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
          </ol>
        </nav>
      </div>
    </div>
    <!--end breadcrumb-->

    <div class="row">
      <div class="col-8">
        <div class="card">
          <div class="card-body p-4">
            <h5 class="mb-10">Edit Urine Record</h5>
            <form class="row g-3" @submit.prevent="submit">
              <div class="row mb-3">
                <label for="analyst_med_tech_id" class="col-sm-3 col-form-label"
                  >Analyst</label
                >
                <div class="col-sm-9">
                  <select
                    class="form-select"
                    v-model="form.analyst_med_tech_id"
                    id="analyst_med_tech_id"
                    required
                  >
                    <option value="">Select Medical Technologist</option>
                    <option
                      v-for="technologist in medicalTechnologists"
                      :key="technologist.id"
                      :value="technologist.id"
                    >
                      {{ technologist.name }}
                    </option>
                  </select>
                  <div class="invalid-feedback d-block">
                    {{ form.errors.analyst_med_tech_id }}
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <label
                  for="verified_by_med_tech_id"
                  class="col-sm-3 col-form-label"
                  >Verified By</label
                >
                <div class="col-sm-9">
                  <select
                    class="form-select"
                    v-model="form.verified_by_med_tech_id"
                    id="verified_by_med_tech_id"
                    required
                  >
                    <option value="">Select Medical Technologist</option>
                    <option
                      v-for="technologist in medicalTechnologists"
                      :key="technologist.id"
                      :value="technologist.id"
                    >
                      {{ technologist.name }}
                    </option>
                  </select>
                  <div class="invalid-feedback d-block">
                    {{ form.errors.verified_by_med_tech_id }}
                  </div>
                </div>
              </div>
              <!-- Add other form fields here -->
              <div class="row mb-3">
                <label for="first_name" class="col-sm-3 col-form-label"
                  >First Name</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.first_name"
                    id="first_name"
                    required
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.first_name }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="middle_name" class="col-sm-3 col-form-label"
                  >Middle Name</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.middle_name"
                    id="middle_name"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.middle_name }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="last_name" class="col-sm-3 col-form-label"
                  >Last Name</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.last_name"
                    id="last_name"
                    required
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.last_name }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="age" class="col-sm-3 col-form-label">Age</label>
                <div class="col-sm-9">
                  <input
                    type="number"
                    class="form-control"
                    v-model="form.age"
                    id="age"
                    required
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.age }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="sex" class="col-sm-3 col-form-label">Sex</label>
                <div class="col-sm-9">
                  <select
                    class="form-select"
                    v-model="form.sex"
                    id="sex"
                    required
                  >
                    <option value="">Select Sex</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                  </select>
                  <div class="invalid-feedback d-block">
                    {{ form.errors.sex }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="ward" class="col-sm-3 col-form-label">Ward</label>
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.ward"
                    id="ward"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.ward }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label
                  for="requesting_physician"
                  class="col-sm-3 col-form-label"
                  >Requesting Physician</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.requesting_physician"
                    id="requesting_physician"
                    required
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.requesting_physician }}
                  </div>
                </div>
              </div>

              <!-- Macro fields -->
              <div class="row mb-3">
                <label for="macro_color" class="col-sm-3 col-form-label"
                  >Macro Color</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.macro_color"
                    id="macro_color"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.macro_color }}
                  </div>
                </div>
              </div>
              <!-- Add other macro fields (transparency, sp_gravity, reaction_ph, albumin, sugar) -->
              <div class="row mb-3">
                <label for="macro_transparency" class="col-sm-3 col-form-label"
                  >Macro Transparency</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.macro_transparency"
                    id="macro_transparency"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.macro_transparency }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="macro_sp_gravity" class="col-sm-3 col-form-label"
                  >Macro Specific Gravity</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.macro_sp_gravity"
                    id="macro_sp_gravity"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.macro_sp_gravity }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="macro_reaction_ph" class="col-sm-3 col-form-label"
                  >Macro Reaction pH</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.macro_reaction_ph"
                    id="macro_reaction_ph"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.macro_reaction_ph }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="macro_albumin" class="col-sm-3 col-form-label"
                  >Macro Albumin</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.macro_albumin"
                    id="macro_albumin"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.macro_albumin }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="macro_sugar" class="col-sm-3 col-form-label"
                  >Macro Sugar</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.macro_sugar"
                    id="macro_sugar"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.macro_sugar }}
                  </div>
                </div>
              </div>

              <!-- Micro fields -->
              <div class="row mb-3">
                <label
                  for="micro_epithelial_cells"
                  class="col-sm-3 col-form-label"
                  >Micro Epithelial Cells</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.micro_epithelial_cells"
                    id="micro_epithelial_cells"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.micro_epithelial_cells }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="micro_red_cells" class="col-sm-3 col-form-label"
                  >Micro Red Cells</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.micro_red_cells"
                    id="micro_red_cells"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.micro_red_cells }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="micro_pus_cells" class="col-sm-3 col-form-label"
                  >Micro Pus Cells</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.micro_pus_cells"
                    id="micro_pus_cells"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.micro_pus_cells }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="micro_bacteria" class="col-sm-3 col-form-label"
                  >Micro Bacteria</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.micro_bacteria"
                    id="micro_bacteria"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.micro_bacteria }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="micro_casts" class="col-sm-3 col-form-label"
                  >Micro Casts</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.micro_casts"
                    id="micro_casts"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.micro_casts }}
                  </div>
                </div>
              </div>

              <!-- Other fields -->
              <div class="row mb-3">
                <label for="others" class="col-sm-3 col-form-label"
                  >Others</label
                >
                <div class="col-sm-9">
                  <textarea
                    class="form-control"
                    v-model="form.others"
                    id="others"
                    rows="3"
                  ></textarea>
                  <div class="invalid-feedback d-block">
                    {{ form.errors.others }}
                  </div>
                </div>
              </div>

              <!-- PT fields -->
              <div class="row mb-3">
                <label for="pt_result" class="col-sm-3 col-form-label"
                  >PT Result</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.pt_result"
                    id="pt_result"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.pt_result }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="pt_brand_name" class="col-sm-3 col-form-label"
                  >PT Brand Name</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.pt_brand_name"
                    id="pt_brand_name"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.pt_brand_name }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="pt_lot_no" class="col-sm-3 col-form-label"
                  >PT Lot No</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.pt_lot_no"
                    id="pt_lot_no"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.pt_lot_no }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="pt_expiry_date" class="col-sm-3 col-form-label"
                  >PT Expiry Date</label
                >
                <div class="col-sm-9">
                  <input
                    type="date"
                    class="form-control"
                    v-model="form.pt_expiry_date"
                    id="pt_expiry_date"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.pt_expiry_date }}
                  </div>
                </div>
              </div>

              <div class="col-12 mt-4">
                <button
                  type="submit"
                  class="btn btn-primary px-4"
                  :disabled="form.processing"
                >
                  Update Urine Record
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>