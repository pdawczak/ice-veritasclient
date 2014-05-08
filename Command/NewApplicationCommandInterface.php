<?php

namespace Ice\VeritasClientBundle\Command;

interface NewApplicationCommandInterface
{
    /**
     * @return mixed
     */
    public function getCourseId();

    /**
     * @return string
     */
    public function getUsername();

    /**
     * @return string
     */
    public function getApplicantTitle();

    /**
     * @return string
     */
    public function getApplicantFirstNames();

    /**
     * @return string
     */
    public function getApplicantLastName();

    /**
     * @return string
     */
    public function getApplicantEmailAddress();

    /**
     * @return string
     */
    public function getApplicantPhone();

    /**
     * @return \DateTime
     */
    public function getApplicantDateOfBirth();

    /**
     * @return string
     */
    public function getApplicantAddressLine1();

    /**
     * @return string
     */
    public function getApplicantAddressLine2();

    /**
     * @return string
     */
    public function getApplicantAddressLine3();

    /**
     * @return string
     */
    public function getApplicantAddressTown();

    /**
     * @return string
     */
    public function getApplicantAddressPostcode();

    /**
     * @return string
     */
    public function getApplicantAddressCounty();

    /**
     * @return string
     */
    public function getApplicantAddressCountry();

    /**
     * @return bool
     */
    public function getApplicantMarketingOptIn();

    /**
     * @return bool
     */
    public function hasBursaryApplication();

    /**
     * @return bool
     */
    public function hasCourseApplication();

    /**
     * @return string
     */
    public function getSubjectInvolvementStatement();

    /**
     * @return string
     */
    public function getHighestQualificationStatement();

    /**
     * @return string
     */
    public function getSupplementaryInformationStatement();

    /**
     * @return bool
     */
    public function hasAppliedForStudentLoan();

    /**
     * @return bool
     */
    public function hasReceivedStudentLoanEntitlementLetter();

    /**
     * @return bool
     */
    public function hasResearchProposal();

    /**
     * @return string
     */
    public function getResearchProposalAsBase64String();

    /**
     * @return mixed
     */
    public function isEnglishFirstLanguage();

    /**
     * @return bool
     */
    public function hasTakenIelts();

    /**
     * @return bool
     */
    public function hasTakenCaeOrCpa();

    /**
     * @return bool
     */
    public function hasNotTakenEnglishProficiencyTest();

    /**
     * @return string
     */
    public function getIeltsTrfNumber();

    /**
     * @return string
     */
    public function getCaeCpaIdNumber();

    /**
     * @return string
     */
    public function getCaeCpaIdSecret();

    /**
     * @return bool
     */
    public function hasJamesStewartBursaryPart();

    /**
     * @return bool
     */
    public function hasPreviouslyStudiedWithIce();

    /**
     * @return bool
     */
    public function hasIvyRoseHoodBursaryPart();

    /**
     * @return bool
     */
    public function hasCambridgeUniversityPressBursaryPart();

    /**
     * @return bool
     */
    public function hasTaughtInUkSchool();

    /**
     * @return string
     */
    public function getUkSchoolContact();

    /**
     * @return bool
     */
    public function hasPreviouslyStudiedAtUniversity();


    /**
     * @return string
     */
    public function getIvyRoseHoodStatement();
}
