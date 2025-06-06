<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { useToast } from "vue-toastification";
import { ref } from "vue";

const props = defineProps({
  medicalTechnologists: Array,
  bloodChemistry: Object,
});

const form = useForm({
  date_of_report: props.bloodChemistry.date_of_report,
  first_name: props.bloodChemistry.first_name,
  last_name: props.bloodChemistry.last_name,
  middle_name: props.bloodChemistry.middle_name,
  age: props.bloodChemistry.age,
  sex: props.bloodChemistry.sex,
  ward: props.bloodChemistry.ward,
  requesting_physician: props.bloodChemistry.requesting_physician,
  fbs: props.bloodChemistry.fbs,
  sgot: props.bloodChemistry.sgot,
  sgpt: props.bloodChemistry.sgpt,
  creatinine: props.bloodChemistry.creatinine,
  bun_urea: props.bloodChemistry.bun_urea,
  uric_acid: props.bloodChemistry.uric_acid,
  total_bilirubin: props.bloodChemistry.total_bilirubin,
  direct_bilirubin: props.bloodChemistry.direct_bilirubin,
  indirect_bilirubin: props.bloodChemistry.indirect_bilirubin,
  total_protein: props.bloodChemistry.total_protein,
  albumin: props.bloodChemistry.albumin,
  globulin: props.bloodChemistry.globulin,
  ag_ratio: props.bloodChemistry.ag_ratio,
  cholesterol: props.bloodChemistry.cholesterol,
  triglyceride: props.bloodChemistry.triglyceride,
  hdl_cholesterol: props.bloodChemistry.hdl_cholesterol,
  ldl_cholesterol: props.bloodChemistry.ldl_cholesterol,
  vldl_cholesterol: props.bloodChemistry.vldl_cholesterol,
  hba1c: props.bloodChemistry.hba1c,
  sodium: props.bloodChemistry.sodium,
  potassium: props.bloodChemistry.potassium,
  chloride: props.bloodChemistry.chloride,
  ionized_calcium: props.bloodChemistry.ionized_calcium,
  nonionized_calcium: props.bloodChemistry.nonionized_calcium,
  total_calcium: props.bloodChemistry.total_calcium,
  analyst_med_tech_id: props.bloodChemistry.analyst_med_tech_id,
  verified_by_med_tech_id: props.bloodChemistry.verified_by_med_tech_id,
});

const submit = () => {
  form.put(route("blood-chemistries.update", props.bloodChemistry.id), {
    onSuccess: () => {
      const toast = useToast();
      toast.success("Blood Chemistry record updated successfully", {
        timeout: 3000,
      });
    },
  });
};
</script>

<template>
  <Head title="Edit Blood Chemistry" />

  <AuthenticatedLayout>
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Blood Chemistry</div>
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
            <h5 class="mb-16">Edit Blood Chemistry Examination Result</h5>
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

              <!-- Blood Chemistry fields -->
              <div class="row mb-3">
                <label for="fbs" class="col-sm-3 col-form-label">FBS</label>
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.fbs"
                    id="fbs"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.fbs }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="sgot" class="col-sm-3 col-form-label"
                  >SGOT (AST)</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.sgot"
                    id="sgot"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.sgot }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="sgpt" class="col-sm-3 col-form-label"
                  >SGPT (ALT)</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.sgpt"
                    id="sgpt"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.sgpt }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="creatinine" class="col-sm-3 col-form-label"
                  >Creatinine</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.creatinine"
                    id="creatinine"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.creatinine }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="bun_urea" class="col-sm-3 col-form-label"
                  >BUN/Urea</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.bun_urea"
                    id="bun_urea"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.bun_urea }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="uric_acid" class="col-sm-3 col-form-label"
                  >Uric Acid</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.uric_acid"
                    id="uric_acid"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.uric_acid }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="total_bilirubin" class="col-sm-3 col-form-label"
                  >Total Bilirubin</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.total_bilirubin"
                    id="total_bilirubin"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.total_bilirubin }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="direct_bilirubin" class="col-sm-3 col-form-label"
                  >Direct Bilirubin</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.direct_bilirubin"
                    id="direct_bilirubin"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.direct_bilirubin }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="indirect_bilirubin" class="col-sm-3 col-form-label"
                  >Indirect Bilirubin</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.indirect_bilirubin"
                    id="indirect_bilirubin"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.indirect_bilirubin }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="total_protein" class="col-sm-3 col-form-label"
                  >Total Protein</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.total_protein"
                    id="total_protein"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.total_protein }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="albumin" class="col-sm-3 col-form-label"
                  >Albumin</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.albumin"
                    id="albumin"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.albumin }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="globulin" class="col-sm-3 col-form-label"
                  >Globulin</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.globulin"
                    id="globulin"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.globulin }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="ag_ratio" class="col-sm-3 col-form-label"
                  >A/G Ratio</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.ag_ratio"
                    id="ag_ratio"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.ag_ratio }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="cholesterol" class="col-sm-3 col-form-label"
                  >Cholesterol</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.cholesterol"
                    id="cholesterol"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.cholesterol }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="triglyceride" class="col-sm-3 col-form-label"
                  >Triglyceride</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.triglyceride"
                    id="triglyceride"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.triglyceride }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="hdl_cholesterol" class="col-sm-3 col-form-label"
                  >HDL Cholesterol</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.hdl_cholesterol"
                    id="hdl_cholesterol"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.hdl_cholesterol }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="ldl_cholesterol" class="col-sm-3 col-form-label"
                  >LDL Cholesterol</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.ldl_cholesterol"
                    id="ldl_cholesterol"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.ldl_cholesterol }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="vldl_cholesterol" class="col-sm-3 col-form-label"
                  >VLDL Cholesterol</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.vldl_cholesterol"
                    id="vldl_cholesterol"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.vldl_cholesterol }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="hba1c" class="col-sm-3 col-form-label">HbA1c</label>
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.hba1c"
                    id="hba1c"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.hba1c }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="sodium" class="col-sm-3 col-form-label"
                  >Sodium (Na+)</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.sodium"
                    id="sodium"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.sodium }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="potassium" class="col-sm-3 col-form-label"
                  >Potassium (K+)</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.potassium"
                    id="potassium"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.potassium }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="chloride" class="col-sm-3 col-form-label"
                  >Chloride (Cl-)</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.chloride"
                    id="chloride"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.chloride }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="ionized_calcium" class="col-sm-3 col-form-label"
                  >Ionized Calcium (iCa)</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.ionized_calcium"
                    id="ionized_calcium"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.ionized_calcium }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="nonionized_calcium" class="col-sm-3 col-form-label"
                  >Non-ionized Calcium (nCa)</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.nonionized_calcium"
                    id="nonionized_calcium"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.nonionized_calcium }}
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="total_calcium" class="col-sm-3 col-form-label"
                  >Total Calcium (TCa)</label
                >
                <div class="col-sm-9">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.total_calcium"
                    id="total_calcium"
                  />
                  <div class="invalid-feedback d-block">
                    {{ form.errors.total_calcium }}
                  </div>
                </div>
              </div>

              <div class="col-12 mt-4">
                <button
                  type="submit"
                  class="btn btn-primary px-4"
                  :disabled="form.processing"
                >
                  Update Blood Chemistry Record
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>