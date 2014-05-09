<?php

namespace Ice\VeritasClientBundle\CommandHandler;

use Ice\VeritasClientBundle\Command\NewApplicationCommandInterface;

class CommandToApplicationArrayAdapter implements CommandToApplicationArrayAdapterInterface
{
    /**
     * Return an array of properties representing the application in the structure used by the Veritas application API
     *
     * @param NewApplicationCommandInterface $command
     * @return array
     */
    public function getParameters(NewApplicationCommandInterface $command)
    {
        $params = [
            'course'=>$command->getCourseId(),
            'username'=>$command->getUsername(),
            'student_details' => $this->getStudentDetailsPart($command)
        ];

        if ($command->hasCourseApplication()) {
            $params['course_application'] = $this->getCourseApplicationPart($command);
        }

        if ($command->hasBursaryApplication()) {
            $params['bursary_application'] = $this->getBursaryApplicationPart($command);
        }

        return $params;
    }

    /**
     * @param NewApplicationCommandInterface $command
     * @return array
     */
    protected function getStudentDetailsPart(NewApplicationCommandInterface $command)
    {
        $params = [
            'title' => $command->getApplicantTitle(),
            'first_name' => $command->getApplicantFirstNames(),
            'last_name' => $command->getApplicantLastName(),
            'dob' => $command->getApplicantDateOfBirth(),
            'phone' => $command->getApplicantPhone(),
            'email' => $command->getApplicantEmailAddress(),
            'line1' => $command->getApplicantAddressLine1(),
            'line2' => $command->getApplicantAddressLine2(),
            'line3' => $command->getApplicantAddressLine3(),
            'town' => $command->getApplicantAddressTown(),
            'postcode' => $command->getApplicantAddressPostcode(),
            'county' => $command->getApplicantAddressCounty(),
            'country' => $command->getApplicantAddressCountry(),
            'marketing_opt_in' => $command->getApplicantMarketingOptIn()?1:0
        ];

        return $params;
    }


    /**
     * @param NewApplicationCommandInterface $command
     * @return array
     */
    protected function getCourseApplicationPart(NewApplicationCommandInterface $command)
    {
        $params = [
            'statement' => $command->getSubjectInvolvementStatement(),
            'highest_qualification' => $command->getHighestQualificationStatement(),
            'student_loan' => $command->hasAppliedForStudentLoan() ?
                ( $command->hasReceivedStudentLoanEntitlementLetter() ? 'r' : 'a' ) :
                'n',
            'supplementary_information' => $command->getSupplementaryInformationStatement(),
            'personal_statement' => $command->getPersonalStatement(),
            'cppa_essay' => $command->getCppaEssay()
        ];

        if ($command->isEnglishFirstLanguage()) {
            $params['english_first_language'] = 1;
        } else {
            $params['english_first_language'] = 0;
            if ($command->hasTakenIELTS()) {
                $params['english_language_number_type'] = 'ielts';
                $params['english_language_number'] = $command->getIeltsTrfNumber();
            }
            if ($command->hasTakenCaeOrCpa()) {
                $params['english_language_number_type'] = 'cae_cpa';
                $params['english_language_number'] = $command->getCaeCpaIdNumber().','.$command->getCaeCpaIdSecret();
            }
            if ($command->hasNotTakenEnglishProficiencyTest()) {
                $params['english_language_number_type'] = 'none';
                $params['english_language_number'] = 'no-test-taken';
            }
        }

        return $params;
    }

    /**
     * @param NewApplicationCommandInterface $command
     * @return array
     */
    protected function getBursaryApplicationPart(NewApplicationCommandInterface $command)
    {
        $params = [
            'eligible' => 1
        ];

        if ($command->hasJamesStewartBursaryPart()) {
            $params['previous_ice_study'] = $command->hasPreviouslyStudiedWithIce() ? 1 : 0;
        }

        if ($command->hasIvyRoseHoodBursaryPart()) {
            $params['previous_uni_study'] = $command->hasPreviouslyStudiedAtUniversity() ? 1 : 0;
            if (!$params['previous_uni_study']) {
                $params['how_eligible'] = $command->getIvyRoseHoodStatement();
            }
        }

        if ($command->hasCambridgeUniversityPressBursaryPart()){
            $params['uk_school'] = $command->hasTaughtInUkSchool() ? 1 : 0;
            if ($params['uk_school']) {
                $params['school_name'] = $command->getUkSchoolContact();
            }
        }

        return $params;
    }
}
