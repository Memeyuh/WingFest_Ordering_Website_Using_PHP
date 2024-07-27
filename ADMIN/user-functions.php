#include <iostream>
#include <string>
using namespace std;

class Student {
private:
    string studentName;
    string studentNumber;
    int year;
    double quizGrade;
    double classStandingGrade;
    double nonAcademicsGrade;
    double majorExamGrade;

public:
    // Constructor to initialize student information
    Student(string name, string number, int y, double quiz, double classStanding, double nonAcademics, double majorExam)
        : studentName(name), studentNumber(number), year(y), quizGrade(quiz), classStandingGrade(classStanding),
          nonAcademicsGrade(nonAcademics), majorExamGrade(majorExam) {}

    // Method to calculate and display year level
    void calculateYearLevel() {
        string yearLevel;
        switch (year) {
            case 1:
                yearLevel = "Freshmen";
                break;
            case 2:
                yearLevel = "Sophomore";
                break;
            case 3:
                yearLevel = "Junior";
                break;
            case 4:
                yearLevel = "Senior";
                break;
            default:
                yearLevel = "Error";
                break;
        }
        cout << "Year Level: " << yearLevel << endl;
    }

    // Method to display student information
    void displayInfo() {
        cout << "Student Name: " << studentName << endl;
        cout << "Student Number: " << studentNumber << endl;
        calculateYearLevel();
    }

    // Method to get quiz grade
    double getQuizGrade() {
        return quizGrade;
    }

    // Method to get class standing grade
    double getClassStandingGrade() {
        return classStandingGrade;
    }

    // Method to get non-academics grade
    double getNonAcademicsGrade() {
        return nonAcademicsGrade;
    }

    // Method to get for major exam grade
    double getMajorExamGrade() {
        return majorExamGrade;
    }
};

class RatingCalculator {
public:
    // Method to calculate, display rating, and equivalent
    static void calculateRating(Student student) {
        double quiz = student.getQuizGrade();
        double classStanding = student.getClassStandingGrade();
        double nonAcademics = student.getNonAcademicsGrade();
        double majorExam = student.getMajorExamGrade();
        
        double rating = (quiz * 0.35) + (classStanding * 0.20) + (nonAcademics * 0.05) + (majorExam * 0.40);
        cout << "Rating: " << rating << endl;

        if (rating >= 98)
            cout << "Equivalent: 1.00" << endl;
        else if (rating >= 95)
            cout << "Equivalent: 1.25" << endl;
        else if (rating >= 92)
            cout << "Equivalent: 1.50" << endl;
        else if (rating >= 89)
            cout << "Equivalent: 1.75" << endl;
        else if (rating >= 86)
            cout << "Equivalent: 2.00" << endl;
        else if (rating >= 83)
            cout << "Equivalent: 2.25" << endl;
        else if (rating >= 80)
            cout << "Equivalent: 2.50" << endl;
        else if (rating >= 77)
            cout << "Equivalent: 2.75" << endl;
        else if (rating >= 75)
            cout << "Equivalent: 3.00" << endl;
        else
            cout << "Equivalent: 5.00" << endl;
    }
};

int main() {
    string name, number;
    int year;
    double quiz, classStanding, nonAcademics, majorExam;

    cout << "Enter Student Name: ";
    getline(cin, name);
    cout << "Enter Student Number: ";
    cin >> number;
    cout << "Enter Year: ";
    cin >> year;
    cout << "Enter Quiz Grade: ";
    cin >> quiz;
    cout << "Enter Class Standing Grade: ";
    cin >> classStanding;
    cout << "Enter Non-Academics Grade: ";
    cin >> nonAcademics;
    cout << "Enter Major Exam Grade: ";
    cin >> majorExam;

    // Create a Student object and display information
    cout << "\n"<< endl;
    Student student(name, number, year, quiz, classStanding, nonAcademics, majorExam);
    student.displayInfo();

    // Calculate and display rating
    RatingCalculator::calculateRating(student);
    
    cout << "\n"<< endl;
    cout << "MEA FLOR R. CARILORIA"<< endl;
    cout << "20201130838"<< endl;

    system("PAUSE > nul");
    return 0;
}
