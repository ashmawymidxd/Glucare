--1)- Users Entity
0-id
1-name
2-email
3-password
4-createdAt
5-updatedAt
6-deletedAt
7-verifiedAt
8-verified
9-rememberToken
10-image_path
11-status
12-phone

--2)- Admin Entity
0-id
1-name
2-email
3-password
4-createdAt
5-updatedAt
6-deletedAt
7-verifiedAt
8-verified
9-rememberToken
10-image_path
11-status
12-phone

--3)- Doctor Entity
0-id
1-name
2-email
3-password
4-createdAt
5-updatedAt
6-deletedAt
7-verifiedAt
8-verified
9-rememberToken
10-image_path
11-status
12-phone
13-speciality
14-qualification
15-experience


--4)- doctor_section Entity
0-id
1-Doctors_id
2-createdAt
3-updatedAt
4-deletedAt
5-section_name
6-section_description


--5)- doctor_appointment Entity
0-id
1-Doctors_id
2-createdAt
3-updatedAt
4-deletedAt
5-appointment_date
6-appointment_time
7-appointment_status
8-appointment_type
11-appointment_reason
12-appointment_description

--6)- patient_appointment Entity
0-id
1-Users_id
2-createdAt
3-updatedAt
4-deletedAt
5-doctor_appointment_id

--7)- Employee Entity
0-id
1-name
2-email
3-password
4-createdAt
5-updatedAt
6-deletedAt
7-verifiedAt
8-verified
9-rememberToken
10-image_path
11-status
12-phone
13-employee_qualification
14-employee_experience

--8)- patient_data Entity
0-id
1-Users_id
2-createdAt
3-updatedAt
4-deletedAt
5-gender
6-age
7-hypertension
9-heart_disease
10-smoking_history
11-bmi
12-HbA1c_level

--9)- patient_diabetes Entity
0-id
1-patient_data_id
2-createdAt
3-updatedAt
4-deletedAt
5-diabetes_type
6-diabetes_duration
8-diabetes_status
9-Users_id

--10)- Message Entity
0-id
1-sender_id
2-receiver_id
3-createdAt
4-updatedAt
5-deletedAt
6-message
7-message_type
8-message_status
9-message_time

--11)- Poste Entity
0-id
1-Users_id
2-createdAt
3-updatedAt
4-deletedAt
5-post_title
6-post_description
7-post_attachment
8-post_type
9-post_status
10-slug

--12)- post_comments Entity
0-id
1-Users_id
2-createdAt
3-updatedAt
4-deletedAt
5-postes_id
6-comment
7-comment_type
8-comment_status
9-comment_time

--13)-website_settings Entity
0-id
1-createdAt
2-updatedAt
3-deletedAt
4-website_name
5-website_logo
6-website_favicon
7-website_email
8-website_phone
9-website_address
10-website_facebook
11-website_twitter
12-website_instagram
14-website_youtube
17-website_whatsapp

--14)- rating_website Entity
0-id
1-Users_id
2-createdAt
3-updatedAt
4-deletedAt
5-rating
6-rating_type
7-rating_status
8-rating_time

--15)- doctor_rating Entity
0-id
1-Users_id
2-createdAt
3-updatedAt
4-deletedAt
5-rating
6-rating_type
7-rating_status
8-rating_time
9-Doctors_id

--16)- service Entity
0-id
1-createdAt
2-updatedAt
3-deletedAt
4-service_name
5-service_description
6-service_image
7-service_status

--17)- service_details Entity
0-id
1-createdAt
2-updatedAt
3-deletedAt
4-service_id
5-service_details_name
6-service_details_description
7-service_details_attachment
8-service_details_status

--18)- notification Entity
0-id
1-Users_id
2-createdAt
3-updatedAt
4-deletedAt
5-notification_title
6-notification_description
7-notification_type
9-notification_status
10-notification_time
11-read_status

--19)-report Entity
0-id
1-Users_id
2-createdAt
3-updatedAt
4-deletedAt
5-report_title
6-report_description
7-report_attachment
8-report_type
9-report_status
10-report_time

--20)-recomented_user_activity Entity
0-id
1-Users_id
2-createdAt
3-updatedAt
4-deletedAt
5-recomented_user_id
6-recomented_user_type
7-recomented_user_status
8-recomented_user_time

--21)-recomented_user_diatary Entity
0-id
1-Users_id
2-createdAt
3-updatedAt
4-deletedAt
5-recomented_user_id
6-recomented_user_type
7-recomented_user_status
8-recomented_user_time

https://www.lucidchart.com/
https://drawsql.app/
https://erdplus.com/

https://drawsql.app/teams/ahmed-hassan-shehata/diagrams/diabetes
https://drawsql.app/teams/ahmed-hassan-shehata/diagrams/diabetes-part2
