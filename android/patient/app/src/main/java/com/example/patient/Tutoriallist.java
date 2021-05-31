package com.example.patient;

public class Tutoriallist {
    int tut_id;
    String tutorialTitle, tutorialText, tutorialLink;

    public Tutoriallist(int tut_id, String tutorialTitle, String tutorialText, String tutorialLink) {
        this.tut_id = tut_id;
        this.tutorialTitle = tutorialTitle;
        this.tutorialText = tutorialText;
        this.tutorialLink = tutorialLink;
    }

    public int getTut_id() {
        return tut_id;
    }

    public String getTutorialTitle() {
        return tutorialTitle;
    }

    public String getTutorialText() {
        return tutorialText;
    }

    public String getTutorialLink() {
        return tutorialLink;
    }
}
